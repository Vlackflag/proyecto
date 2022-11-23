<?php 
session_start();
$alerta="";
if (!isset($_SESSION['rol'])) {
  header("location: index.php");
}

if (isset($_SESSION['alerta'])) {
  $alerta=$_SESSION['alerta'];
  unset($_SESSION['alerta']);
}

if (isset($_SESSION['rol'])) {
  $tipo=$_SESSION['rol'];
}

if ($_SESSION['rol']==3) {
  header("location: index.php");
}

if (isset($_SESSION['rol'])) {
  $rol = $_SESSION['rol'];
  $nombreUsuario = $_SESSION['nombreUsuario'];
}


if ($alerta=='errorId') {
    $nombre = $_SESSION['regresaNombre'];
    $modelo = $_SESSION['regresaModelo'];
    $marca = $_SESSION['regresaMarca'];
    $precio = $_SESSION['regresaPrecio'];
    $cantidad = $_SESSION['regresaCantidad'];
    $almacen = $_SESSION['regresaAlmacen'];
    $nParte = $_SESSION['regresaNParte'];
    $observacion = $_SESSION['regresaObservaciones'];
}else{
    $id =
    $nombre = "";
    $modelo = "";
    $marca = "";
    $precio = "";
    $cantidad = "";
    $almacen = "";
    $nParte = "";
    $observacion = "";
  }


unset($_SESSION['regresaId'],$_SESSION['regresaNombre'],$_SESSION['regresaModelo'],$_SESSION['regresaMarca'],$_SESSION['regresaPrecio'],$_SESSION['regresaCantidad'],$_SESSION['regresaAlmacen'],$_SESSION['regresaNParte'],$_SESSION['regresaObservaciones']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registra producto</title>
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
                    <a class="dropdown-item disabled" href="registraProducto.php">Registrar nuevo producto</a>
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
                    <a class="dropdown-item" href="actualizaEmpleado.php">Actualiza empleado</a>
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
                <a class="nav-link" href="gestionInventario.php">Gestion del inventario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Registra productos</a>
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
      <a type="button" class="btn btn-dark texto margin" href="gestionInventario.php">Regresa.</a>
    </div>
  </div>
</div>

<?php if (!$alerta == "") {?>
</br>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-10 col-sm-auto font-weight-bold">
      <?php if ($alerta == "exitoAlRegistrar") { ?>
        <div class="alert alert-info text-info alert-dismissible fade show">
          Exito al registrar el producto.
          <button class="close bg-info text-white" data-dismiss="alert" aria-label="Close">
            <span>&times;</span>
          <?php } else if ($alerta == "errorId") { ?>
            <div class="alert alert-warning text-secondary alert-dismissible fade show">
              Error, el <b>Id</b> ingresado ya se encuentra en uso.
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
            <h1 class="h1">Complete los campos del producto nuevo</h1>
            <form action="registraNuevoProductoA.php" method="POST" enctype="multipart/form-data">
              <p class="p">
                <label class="label" for="id">Id.
                  <span class="span">*</span>
                </label>
                <input class="input" <?php if ($id != "") {echo "value='".$id."'";}?> type="text" id="id" name="id" required="" placeholder="Escribe el id del producto">
              </p>

              <p class="p">
                <label class="label" for="nombre">Nombre.
                  <span class="span">*</span>
                </label>
                <input class="input" <?php if ($nombre != "") {echo "value='".$nombre."'";}?> type="text" id="nombre" name="nombre" required="" placeholder="Escribe el nombre del producto">
              </p>

              <p class="p">
                <label class="label" for="modelo">Modelo.
                  <span class="span">*</span>
                </label>
                <input class="input" <?php if ($modelo != "") {echo "value='".$modelo."'";}?> type="text" id="modelo" name="modelo" required="" placeholder="Escribe el modelo del producto">
              </p>

              <p class="p">
                <label class="label" for="marca">Marca.
                  <span class="span">*</span>
                </label>
                <input class="input" <?php if ($marca != "") {echo "value='".$marca."'";}?> type="text" id="marca" name="marca" required="" placeholder="Escribe la marca del producto">
              </p>

              <p class="p">
                <label class="label" for="precio">Precio
                  <span class="span">*</span>
                </label>
                <input class="input"  <?php if ($precio != "") {echo "value='".$precio."'";}?> type="number" name="precio" id="precio" required="" placeholder="Precio" min='1'>
              </p>

              <p class="p">
                <label class="label" for="cantidad">Cantidad
                  <span class="span">*</span>
                </label>
                <input class="input"  <?php if ($cantidad != "") {echo "value='".$cantidad."'";}?> type="number" name="cantidad" id="cantidad" required="" placeholder="Cantidad" min='1'>
              </p>


              <p class="p">
                <label class="label" for="almacen">Almacen
                  <span class="span">*</span>
                </label>
                <input class="input"  <?php if ($almacen != "") {echo "value='".$almacen."'";}?> type="text" name="almacen" id="almacen" required="" placeholder="Almacen" >
              </p>

              <p class="p">
                <label class="label" for="nParte">Numero de parte
                </label>
                <input class="input"  <?php if ($nParte != "") {echo "value='".$nParte."'";}?> type="text" name="nParte" id="nParte"  placeholder="Numero de parte" >
              </p>

              <p class="p">
                <label class="label" for="observacion">Observaci&oacute;n
                </label>
                <input class="input"  <?php if ($observacion != "") {echo "value='".$observacion."'";}?> type="text" name="observacion" id="observaciones" placeholder="Observacion" >
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

</body>


</html>