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


$sql="SELECT id FROM productos WHERE id='$id'";
$result=mysqli_query($conexion,$sql);
if (mysqli_num_rows($result) > 0) {
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
    header("Location: registrarNuevoProducto.php");
}else{

    if (empty($nParte)) {
        $nParte = "S/N";
    }
    if (empty($observaciones)) {
        $observaciones = "...";
    }

    $sql="INSERT INTO productos(id,nombre,modelo,marca,precio,cantidad,almacen,numeroDeParte,observaciones)
    VALUES ('$id','$nombre','$modelo','$marca',$precio,$cantidad,'$almacen','$nParte','$observaciones')";
    $result=mysqli_query($conexion,$sql);
    $_SESSION['alerta']="exitoAlRegistrar";
    header("Location: registrarNuevoProducto.php");
}

?>




