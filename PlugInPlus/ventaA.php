<?php 
session_start();
require_once "conexion.php";
$conexion=conexion();
$id=$_POST['id'];
$cantidad=$_POST['cantidad'];

$sql="SELECT id,nombre,cantidad FROM productos WHERE id='$id'";
$result=mysqli_query($conexion,$sql);

if (mysqli_num_rows($result) > 0) {
    $fila= mysqli_fetch_array ($result);
    //$nombreUsuario = $fila['nombre'];

    if ($fila['cantidad']>0) {
        // la cantidad es suficiente
        $cantidadNueva = ($fila['cantidad']-$cantidad);

        $sql="UPDATE productos set cantidad=$cantidadNueva where id=$id"; 
        $result=mysqli_query($conexion,$sql);
        $_SESSION['alerta']="exitoEnLaVenta";
        $_SESSION['producto']=$fila['nombre'];
        $_SESSION['cantidad']=$cantidad;
        header("Location: venta.php");

    }else if ($fila['cantidad']==0) {
        // error, imposible de desconar a 0
        $_SESSION['alerta']="errorEnLaVenta";
        header("Location: venta.php");
    }
}else{
    $_SESSION['alerta'] = "errorID"; 
    header("Location: venta.php");
}  
?>


