<?php
session_start();
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');
require_once "conexion.php";
$conexion=conexion();
?>

<table>
  <tr>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>MODELO</th>
    <th>MARCA</th>
    <th>PRECIO</th>
    <th>CANTIDAD</th>
    <th>ALMACEN</th>
    <th>N° PARTE</th>
    <th>OBSERVACIONES</th>
  </tr>

  <?php 
  $sql="SELECT * from productos"; $result=mysqli_query($conexion,$sql); while($mostrar=mysqli_fetch_array($result)){ ?>
    <tr>
      <th scope="row"><?php echo $mostrar['id'] ?></th>
      <td><?php echo $mostrar['nombre'] ?></td>
      <td><?php echo $mostrar['modelo'] ?></td>
      <td><?php echo $mostrar['marca'] ?></td>
      <td><?php echo $mostrar['precio'] ?></td>
      <td><?php echo $mostrar['cantidad'] ?></td>
      <td><?php echo $mostrar['almacen'] ?></td>
      <td><?php echo $mostrar['numeroDeParte'] ?></td>
      <td><?php echo $mostrar['observaciones'] ?></td>
    </tr>
  <?php } ?>
</table>
