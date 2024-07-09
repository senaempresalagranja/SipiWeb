<?php 

include "../include/conexion.php" ;

$Rol=$_POST["Rol"];
$contraseña_actual=(sha1(sha1($_POST['contraseña_actual'])));
$contraseña_nueva=$_POST["contraseña_nueva"];


$query="SELECT * FROM usuarios  WHERE Usuario='$Rol' ";

$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


$salt='AZC·$%9742#¬~€~¬~#bsg35679#~€¬$)%1243';
$resource1=password_verify($salt . $contraseña_actual, $fila[4]);

if ($fila[4]==$contraseña_actual) {

$contraseña=(sha1(sha1($_POST['contraseña_nueva'])));

$query="UPDATE Usuarios SET  Contrasena='$contraseña' WHERE Usuario='$Rol'";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>


  swal('Exito','Actualizacion Exitosa','success');

	</script>";




	
}else{
	echo "<script>


  swal('ERROR','Actualizacion Fallida','error');

	</script>";
}




}else{

	echo "<script>


  swal('ERROR','Contraseña Actual Incorrecta','error');

	</script>";
	echo "<script>

var contraseña_nueva=document.getElementById('contraseña_nueva').value='';
var repita_contraseña=document.getElementById('repita_contraseña').value='';
var contraseña_actual=document.getElementById('contraseña_actual').value='';


	</script>";
}




 ?>