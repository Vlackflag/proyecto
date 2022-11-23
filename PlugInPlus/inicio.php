<?php 
session_start();
$alerta="";
if (isset($_SESSION['rol'])) {
	$rol = $_SESSION['rol'];
	$nombreUsuario = $_SESSION['nombreUsuario'];
}

if (!isset($_SESSION['rol'])) {
	header("location: index.php");
}

if (isset($_SESSION['alerta'])) {
	$alerta=$_SESSION['alerta'];
	unset($_SESSION['alerta']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio</title>
	<!-- Link que agrega los estilos de bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Link que agrega los estilos de bootstrap -->
	<link rel="stylesheet" href="bootstrap_4_5_3/css/bootstrap.min.css">
	<!-- Link a mis stilos css -->
	<link rel="stylesheet" type="text/css" href="css/estilo_global.css">

</head>
<body>


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
										<a class="dropdown-item" href="registrarNuevoProducto.php">Registrar nuevo producto</a>
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
					<a class="navbar-brand" href="#header">Principal</a>
					
					<div class="collapse navbar-collapse " id="navbarSupportedContent">

					</div>
					<?php if (isset($_SESSION['rol'])) {?>
						<h6 class="text-white">Sesi&oacute;n iniciada como: <a disabled href="perfil.php"><?php echo $_SESSION['nombreUsuario'].'.'; ?></a></h6>
					<?php } ?>
				</nav>
			</div>
		</div>
	</div>
	<!-- .............................................. -->
	<!-- icono, nombre de pagina Iniciar sesión y navbar-->

	<!-- populares -->
	<!-- ......... -->


	<?php if (!$alerta == "") {?>
	</br>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-10 col-sm-auto font-weight-bold">
				<?php if ($alerta == "sesionIniciada") { ?>
					<div class="alert alert-info text-success alert-dismissible fade show">
						Sesi&oacute;n iniciada de manera correcta.
						<button class="close bg-info text-white" data-dismiss="alert" aria-label="Close">
							<span>&times;</span>
						<?php } ?>
					</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</br></br>

<div class="container-fluid text-white text-center">

	<div class="row">
		<div class="col-12">
			<h2 class="badge-pill">Bienvenido</h2>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-sm-8 col-md-4 col-lg-5 align-self-center">
				<a type="button" class="btn btn-dark texto margin alto" href="inventario.php"><img style="margin-top: 10px;" src="img/visualizar.png" width="20%"></br>Visualizar inventario.</a>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-sm-8 col-md-4 col-lg-5 align-self-center">
				<a type="button" class="btn btn-dark texto margin alto" href="gestionInventario.php"><img style="margin-top: 10px;" src="img/inventario.png" width="20%"></br>Gestionar inventario.</a>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-sm-8 col-md-4 col-lg-5 align-self-center">
			<?php if ($rol==1) {?>
				<a type="button" class="btn btn-dark texto margin alto" href="gestionEmpleados.php"><img style="margin-top: 10px;" src="img/empleados.png" width="20%"></br>Gestionar empleados.</a>
			<?php } ?>
		</div>
	</div>


	<div class="col-12">
		<a type="button" class="btn btn-dark texto margin" href="index.php">Regresa.</a>
	</div>

</div>
<div class="vacio"></div><div class="vacio"></div>





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


