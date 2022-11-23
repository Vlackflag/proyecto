<?php 
session_start();
$alerta="";
$matricula="";

if (isset($_SESSION['rol'])) {
	header("location: inicio.php");
}

if (isset($_SESSION['alerta'])) {
	$alerta=$_SESSION['alerta'];
	unset($_SESSION['alerta']);
}

if (isset($_SESSION['regresaMatricula'])) {
	$matricula=$_SESSION['regresaMatricula'];
	unset($_SESSION['regresaMatricula']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iniciar sesion</title>
	<!-- Link que agrega los estilos de bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Link que agrega los estilos de bootstrap -->
	<link rel="stylesheet" href="bootstrap_4_5_3/css/bootstrap.min.css">
	<!-- Link a mis stilos css -->
	<link rel="stylesheet" type="text/css" href="css/estilo_global_formulario.css">

</head>
<body>


	<!-- icono, nombre de pagina Iniciar sesión y navbar-->
	<!-- .............................................. -->
	<header class="container-fluid bg-n" id="header">
		<div class="col-sm-6 col-md-6 col-lg-3">
			<center><a href="index.php"><img style="margin-top: 10px;border-radius: 10%;" src="img/icon.png" width="30%"></a></center>
			<h1 class="text texto">Plug In Plus +</h1>
		</div>
	</header>
	<!-- .............................................. -->
	<!-- icono, nombre de pagina Iniciar sesión y navbar-->
</br></br>
<?php 
if (!$alerta == "") {?>
</br>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-10 col-sm-auto font-weight-bold">
			<?php if($alerta == "sesionCerrada"){?>
				<div class="alert alert-dark text-secondary alert-dismissible fade show">
					Sesi&oacute;n cerrada de manera correcta
					<button class="close bg-dark" data-dismiss="alert" aria-label="Close">
						<span>&times;</span>
					<?php } else if($alerta == "errorMatricula"){?>
						<div class="alert alert-dark text-secondary alert-dismissible fade show">
							La matricula que ingreso no se encuentra registrada, por favor verif&iacute;quela.
							<button class="close bg-dark" data-dismiss="alert" aria-label="Close">
								<span>&times;</span>
							<?php } else if ($alerta == "errorPassword") { ?>
								<div class="alert alert-dark text-secondary alert-dismissible fade show">
									Error, la contraseña ingresada es incorrecta, vuelva a intentarlo.
									<button class="close bg-dark text-white" data-dismiss="alert" aria-label="Close">
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
					<div class="col-12 ">
						<div class="contact_form">
							<div class="formulario">      
								<h1 class="h1">Inicio de Sesi&oacute;n</h1>
								<form action="verifica_usuario.php" method="POST">
									<p class="p">
										<label class="label" for="nombre">Matricula
											<span class="span">*</span>
										</label>
										<input class="input" <?php if ($matricula != "") {echo "value='".$matricula."'";}?> type="text" name="matricula" id="matricula" required="" placeholder="Escribe tu matricula">
									</p>
									<p class="p">
										<label class="label" for="contra" class="colocar_email">Contraseña
											<span class="span">*</span>
										</label>
										<input class="input" type="password" name="contra" id="contra" required="" placeholder="Escribe tu contraseña">
									</p>     
									<button class="button" type="submit"><p class="p">Enviar</p></button>
									<p class="aviso">
										<span class="span"> * </span>los campos son obligatorios.
									</p> 
								</br>       
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
