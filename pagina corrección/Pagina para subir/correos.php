<?php 
$destino = "gerencia@ep4.com.mx"; 

$nombre= $_POST['nombre'];
$email= $_POST['email'];
$servicio= $_POST['servicio'];
$mensaje= $_POST['message'];

$carta1 = "De: $nombre ,\n";
$carta2 = "Correo: $email ,\n";
$carta3 = "Servicio: $servicio ,\n";
$carta4 = "Mensaje: $mensaje";

$mensaje= $carta1.$carta2.$carta3.$carta4;



mail($destino, $mensaje, $carta1);
echo $mensaje;
//echo "<script> setTimeout(\"location.href='index.html'\", 1000) </script>";
echo "<script> alert('Mensaje Enviado'); </script>";
header("Location:index.html");



?>