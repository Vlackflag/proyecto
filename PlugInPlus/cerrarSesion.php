<?php 
session_start();
session_destroy();
session_start();
$_SESSION['alerta']='sesionCerrada';
header("location:index.php");
?>