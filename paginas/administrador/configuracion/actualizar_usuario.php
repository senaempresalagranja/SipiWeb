<?php 

include '../include/conexion.php';
$usuario=$_POST["usuario"];
$rol=$_POST["rol"];
$estado=$_POST["estado"];
$nombre=$_POST["nombre"];
$id_usuario=$_POST["id_usuario"];

$query="SELECT * FROM `usuarios` WHERE usuarios.Usuario='$usuario' AND usuarios.Id_usuario!=$id_usuario";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	 echo "<div class='row'>
  <div class='col-md-12'  style='background: red;color: white; width: 60%; border-radius: 5px;
  height: 50px; margin-top: auto; position: relative;'>
    <br>
Usuario Ya Existe
    <br>
  </div>
</div>";
}else{

$query="UPDATE `usuarios` SET `Usuario`='$usuario',`Rol`='$rol',`Activo`='$estado', Nombre_Usuario='$nombre' WHERE usuarios.Id_usuario=$id_usuario";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {

echo "<script>

window.location = 'usuarios.php';
</script>";
}

}

 ?>