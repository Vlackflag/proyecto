<?php
require_once "conexion.php";
$conexion = conexion();
$alerta="";
$email="";
session_start();
if (!isset($_SESSION['rol'])) {
	header("location: index.php");
}

if (isset($_SESSION['alerta'])) {
	$alerta=$_SESSION['alerta'];
	unset($_SESSION['alerta']);
}

if (isset($_SESSION['regresaEmail'])) {
	$email=$_SESSION['regresaEmail'];
	unset($_SESSION['regresaEmail']);
}

if (isset($_SESSION['rol'])) {
	$rol = $_SESSION['rol'];
	$nombreUsuario = $_SESSION['nombreUsuario'];
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visualizar producto</title>
	<!-- Link que agrega los estilos de bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Link que agrega los estilos de bootstrap -->
	<link rel="stylesheet" href="bootstrap_4_5_3/css/bootstrap.min.css">
	<!-- Link a mis stilos css -->
	<link rel="stylesheet" type="text/css" href="css/estilo_global.css">
	


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
									<a class="dropdown-item disabled" href="inventario.php">Visualizar inventario</a>
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
					<a class="navbar-brand" href="index.php">Home</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse " id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto ">
							<li class="nav-item">
								<a class="nav-link disabled">Vizualizar productos</a>
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
<div class="container-fluid text-white text-center">
	<div class="row">
		<div class="col-12">
			<a type="button" class="btn btn-dark texto margin" href="inicio.php">Regresa.</a>
			<button onclick="location.href='excel.php'" type="button" class="btn btn-dark">Exportar tabla a Excel</button>
		</br>
	</div>
</div>
</div>

<br/>


<div class="container-fluid">
	<div class="row.no-gutters ">
		<div class="col.no-gutters">
			<div class="table-responsive ">
				<table class="table table-striped table-dark text-center">
					<thead>
						<tr>
							<th class="align-middle" scope="col">ID</th>
							<th class="align-middle" scope="col">NOMBRE</th>
							<th class="align-middle" scope="col">MODELO</th>
							<th class="align-middle" scope="col">MARCA</th>
							<th class="align-middle" scope="col">PRECIO</th>
							<th class="align-middle" scope="col">CANTIDAD</th>
							<th class="align-middle" scope="col">ALMACEN</th>
							<th class="align-middle" scope="col">N° PARTE</th>
							<th class="align-middle" scope="col">OBSERVACIONES</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sql="SELECT * from productos"; $result=mysqli_query($conexion,$sql); while($mostrar=mysqli_fetch_array($result)){ ?>
							<tr>
								<th scope="row"><?php echo $mostrar['id'] ?></th>
								<td><?php echo $mostrar['nombre'] ?></td>
								<td><?php echo $mostrar['modelo'] ?></td>
								<td><?php echo $mostrar['marca'] ?></td>
								<td><?php echo $mostrar['precio'] ?></td>
								<td><?php echo $mostrar['cantidad'] ?></td>
								<td><?php echo $mostrar['almacen'] ?></td>
								<td><?php echo $mostrar['numeroDeParte'] ?></td>
								<td><?php echo $mostrar['observaciones'] ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</br>
<div class="vacio" ></div>



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