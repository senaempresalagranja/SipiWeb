<?php 
include '../include/conexion.php';
$id=$_POST["id"];


	$sql="UPDATE `pedido` SET `Estado_Pedido`='Cancelado' WHERE `id_Pedido`=$id";
	$res=mysqli_query($conexion,$sql);	



$sql="UPDATE `pedido_producto` SET `Estado`='Cancelado' WHERE `id_Pedido`=$id";

	$res=mysqli_query($conexion,$sql);	

	

	if ($res==true) {

	}else{

	}



echo "<script>
traer_resumen('$id');
inicio();
</script>";


?>