<?php 
require_once "conexion.php";
$conexion=conexion();
session_start();

$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$apellidoPa=$_POST['apellidoPa'];
$apellidoMa=$_POST['apellidoMa'];
$pass=$_POST['password'];
$pass2=$_POST['password2'];
$rol=$_POST['rol'];

if ($pass == $pass2) {
        //Prosigue tras verificar que las contraseñas coinciden

	$sql="SELECT matricula FROM usuarios WHERE matricula='$matricula'";
	$result=mysqli_query($conexion,$sql);
	if (mysqli_num_rows($result) > 0) {
		//Si ya existe prosigue a actualizar el registro, ya que existe el registro para modificarlo.

		$sql2="UPDATE usuarios set nombre='$nombre',apellidoPa='$apellidoPa',apellidoMa='$apellidoMa',matricula='$matricula',password='$pass', rol='$rol'where matricula='$matricula'"; 
		$result2=mysqli_query($conexion,$sql2)or die(mysqli_error($conexion));

		$_SESSION['alerta'] = "exitoAlModificar";
		header("Location: actualizaEmpleado.php");
	}else{

		$_SESSION['alerta'] = "NoExiste"; 

		$_SESSION['regresaNombre'] = $nombre;
		$_SESSION['regresaApellidoP'] = $apellidoPa;
		$_SESSION['regresaApellidoM'] = $apellidoMa;
		$_SESSION['regresaPass'] = $pass;
		$_SESSION['regresaPass2'] = $pass2;
		$_SESSION['regresaRol'] = $rol;

		header("Location: actualizaEmpleado.php"); 
	} 

}else{
	$_SESSION['alerta'] = "passwordsDiferentes";
	$_SESSION['regresaMatricula'] = $matricula;
	$_SESSION['regresaNombre'] = $nombre;
	$_SESSION['regresaApellidoP'] = $apellidoPa;
	$_SESSION['regresaApellidoM'] = $apellidoMa;
	$_SESSION['regresaRol'] = $rol;
	header("Location: actualizaEmpleado.php");
        //Regresa a modificar, las contraseñas nuevas son diferentes
}

?>




