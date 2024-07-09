
<?php
include "conexion.php";
$contrasena=(sha1(sha1($_POST['contrasena'])));

$usuario=$_POST['usuario'];

$res=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$usuario'")	or die(mysqli_error());
$reg=mysqli_fetch_row($res);
if ($reg==true) {
	
if ($reg[4]==$contrasena) {

	echo "<script>


var formulario_login=document.getElementById('formulario_login').submit();
	</script>";
	
}else{

	echo "<script>
swal('Oops','Contraseña Incorrecta','error')
	</script>";

}

}else{



	echo "<script>
swal('Oops','Usuario Incorrecto','error')
	</script>";
}
	
?>