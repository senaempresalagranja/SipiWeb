<?php
include 'conexion.php';

$usuario1=$_POST['usuario1'];

$query="SELECT * FROM `usuarios` WHERE `Usuario`='$usuario1'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


if ($fila[3]=="Administrador") {
  session_start();
  $_SESSION['usuario']=$_POST['usuario1'];
  $_SESSION['contraseña']=$_POST['contraseña1'];
  $_SESSION['instante']   = time(10000000);
  header("Location:paginas/Administrador/inicio/index.php");

}

 ?>
