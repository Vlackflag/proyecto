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

        $conexion=conexion();
        //consulta que verifica si ya existe el correo en la base.
        $sql="SELECT matricula FROM usuarios WHERE matricula='$matricula'";
        $result=mysqli_query($conexion,$sql);
        if (mysqli_num_rows($result) > 0) {
            //Si ya existe regresa a la pagina registra y da error, no se pueden usar matriculas duplicados.
            $_SESSION['alerta'] = "yaExiste";

            $_SESSION['regresaNombre'] = $nombre;
            $_SESSION['regresaApellidoP'] = $apellidoPa;
            $_SESSION['regresaApellidoM'] = $apellidoMa;
            $_SESSION['regresaPass'] = $pass;
            $_SESSION['regresaPass2'] = $pass2;
            $_SESSION['regresaRol'] = $rol;
             
            header("Location: registraEmpleado.php");
        } else {
            //Si no existe procede a insertarlo con normalidad.
            $sql2="INSERT INTO usuarios(nombre,apellidoPa,apellidoMa,matricula,password,rol)
            VALUES ('$nombre','$apellidoPa','$apellidoMa','$matricula','$pass',$rol)";
            $resultado2=mysqli_query($conexion,$sql2)or die(mysqli_error($conexion));

            $_SESSION['alerta'] = "exitoAlCrear"; 
            header("Location: registraEmpleado.php");
        }

    }else{
        $_SESSION['alerta'] = "passwordsDiferentes";
        $_SESSION['regresaMatricula'] = $matricula;
        $_SESSION['regresaNombre'] = $nombre;
        $_SESSION['regresaApellidoP'] = $apellidoPa;
        $_SESSION['regresaApellidoM'] = $apellidoMa;
        $_SESSION['regresaRol'] = $rol;
        header("Location: registraEmpleado.php");
        //Regresa a registrar, las contraseñas son diferentes
    }
    
?>




            