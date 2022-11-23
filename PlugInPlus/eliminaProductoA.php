<?php 
session_start();
require_once "conexion.php";
$conexion=conexion();
$id=$_POST['id'];

$sql="SELECT * FROM productos WHERE id='$id'";
$result=mysqli_query($conexion,$sql);
if (mysqli_num_rows($result) > 0) {
    $sql2="DELETE FROM productos where id='$id'";
    $result2=mysqli_query($conexion,$sql2)or die(mysqli_error($conexion));
    $_SESSION['alerta'] = "exitoID"; 
    header("Location: eliminaProducto.php");
}else{
    $_SESSION['alerta'] = "errorID"; 
    header("Location: eliminaProducto.php");
}  
?>


