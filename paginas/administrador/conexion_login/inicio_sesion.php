<?php
include '../../../conexion.php';

session_start();
$usuario=$_SESSION['usuario'];
$contraseña=$_SESSION['contraseña'];


if (isset($usuario)) {
							$query="SELECT * FROM `usuarios` WHERE `Usuario`='$usuario'";
							$resource=mysqli_query($conexion,$query);

							$fila=mysqli_fetch_row($resource);
							$id_usuario=$fila[0];
$usuario_sesion=$fila[2];
$nombre_usuario=$fila[1];
$rol=$fila[3];

echo "<script>
var usuario_sesion='$usuario_sesion';
var nombre_usuario='$nombre_usuario';
var rol='$rol';
</script>";

}else{

header("Location:../../../index.php");


}







 ?>
