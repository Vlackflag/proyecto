<?php 
session_start();
require_once "conexion.php";
$conexion=conexion();
$matricula=$_POST['matricula'];

$sql="SELECT * FROM usuarios WHERE matricula='$matricula'";
$result=mysqli_query($conexion,$sql);
if (mysqli_num_rows($result) > 0) {
    if ($_SESSION['matricula']==$matricula) {
        $_SESSION['alerta'] = "errorAdmin"; 
        header("Location: eliminaEmpleado.php");
    }else{
        $sql2="DELETE FROM usuarios where matricula='$matricula'";
        $result2=mysqli_query($conexion,$sql2)or die(mysqli_error($conexion));
        $_SESSION['alerta'] = "exitoMatricula"; 
        header("Location: eliminaEmpleado.php");
    }

}else{
    $_SESSION['alerta'] = "errorMatricula"; 
    header("Location: eliminaEmpleado.php");
}  
?>


