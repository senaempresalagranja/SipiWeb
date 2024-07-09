<?php 

include "../include/conexion.php";
$usuario=$_POST["usuario"];
$rol=$_POST["rol"];
$estado=$_POST["estado"];
$contraseña=$_POST["contraseña"];
$nombre=$_POST["nombre"];


$salt='AZC·$%9742#¬~€~¬~#bsg35679#~€¬$)%1243';
$contraseña=password_hash($salt .$contraseña, PASSWORD_DEFAULT,["cost"=> 12]);

$query="SELECT * FROM `usuarios` WHERE usuarios.Usuario='$usuario'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
		 echo "<div class='row'>
		 <br>
  <div class='col-md-12'  style='background: red;color: white; width: 60%; border-radius: 5px;
  height: 50px; margin-top: auto; position: relative;'>
    <br>
Usuario Ya Existe
    <br>
  </div>
</div>";
}else{
$query="INSERT INTO `usuarios`( `Usuario`, `Rol`, `Contrasena`, `Activo`,Nombre_Usuario) VALUES ('$usuario','$rol','$contraseña','$estado','$nombre')";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>

window.location='usuarios.php';
	</script>";
}

}


 ?>