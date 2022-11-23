<?php 
    session_start();
    require_once "conexion.php";
    $matricula=$_POST['matricula'];
    $pass=$_POST['contra'];
    $conexion=conexion();
    

    $sql="SELECT * FROM usuarios WHERE matricula='$matricula' and password='$pass'";
    $result=mysqli_query($conexion,$sql);
    

    try {
        
    
    
    if (mysqli_num_rows($result) > 0) {
        //se valida que exista un registro con esa contraseña y correo
        $fila= mysqli_fetch_array ($result);
        $nombreUsuario = $fila['nombre'].' '.$fila['apellidoPa'].' '.$fila['apellidoMa'];
        $rol = $fila['rol'];
        $_SESSION['rol']=$rol;
        $_SESSION['nombreUsuario']=$nombreUsuario;
        $_SESSION['matricula']=$fila['matricula'];
        $_SESSION['alerta']='sesionIniciada';
        header("Location: inicio.php");
        
    }else{
        $sql="SELECT * FROM usuarios WHERE matricula='$matricula'";
        $result=mysqli_query($conexion,$sql);
        $fila= mysqli_fetch_array ($result);
        if (mysqli_num_rows($result) == 0) {
            //error no existe la matricula
            $_SESSION['alerta'] = "errorMatricula"; 
            header("Location: index.php");
        }else if($fila['password'] != $pass){
            //error la contraseña no es correcta
            $_SESSION['alerta'] = "errorPassword"; 
            $_SESSION['regresaMatricula'] = $matricula; 
            header("Location: index.php");
        }
    }

    } catch (Exception $e) {
        header("Location: index.php");
    }
?>




            