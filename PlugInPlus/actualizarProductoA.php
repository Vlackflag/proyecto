<?php 
session_start();
require_once "conexion.php";
$conexion=conexion();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$modelo=$_POST['modelo'];
$marca=$_POST['marca'];
$precio=$_POST['precio'];
$cantidad=$_POST['cantidad'];
$almacen=$_POST['almacen'];
$nParte=$_POST['nParte'];
$observaciones=$_POST['observacion'];


$sql="SELECT id from productos WHERE id=$id"; 
$result=mysqli_query($conexion,$sql)or die(mysqli_error($conexion));

if (mysqli_num_rows($result) > 0) {
    $sql="UPDATE productos set nombre='$nombre',modelo='$modelo',marca='$marca',precio=$precio,cantidad=$cantidad,almacen='$almacen',numeroDeParte='$nParte',observaciones='$observaciones' where id=$id"; 
    $result=mysqli_query($conexion,$sql);
    $_SESSION['alerta']="exitoAlActualizar";
    header("Location: actualizaProducto.php");
}else{
    //error el id ya existe
    $_SESSION['alerta']="errorId";
    $_SESSION['regresaNombre']=$nombre;
    $_SESSION['regresaModelo']=$modelo;
    $_SESSION['regresaMarca']=$marca;
    $_SESSION['regresaPrecio']=$precio;
    $_SESSION['regresaCantidad']=$cantidad;
    $_SESSION['regresaAlmacen']=$almacen;
    $_SESSION['regresaNParte']=$nParte;
    $_SESSION['regresaObservaciones']=$observaciones;
    header("Location: actualizaProducto.php");
}
?>




