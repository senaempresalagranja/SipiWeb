<?php 
include '../include/conexion.php';
$id=$_POST["id"];

$sql="SELECT pedido_producto.id_Pedido_Producto,pedido_producto.id_Pedido FROM `loteproduccion` 
INNER JOIN pedido_producto ON loteproduccion.id_Pedido_Producto=pedido_producto.id_Pedido_Producto
WHERE loteproduccion.id_Lote_Produccion=$id";

	$res=mysqli_query($conexion,$sql);
	$row=mysqli_fetch_row($res);
	$id_pedido=$row[1];

	$sql="SELECT COUNT(id_Pedido) FROM `pedido_producto` WHERE `Estado`='Terminado' and `id_Pedido`=$id_pedido";

	$res=mysqli_query($conexion,$sql);
	$numero_terminado=mysqli_fetch_row($res);

		$sql="SELECT COUNT(id_Pedido) FROM `pedido_producto` WHERE  `id_Pedido`=$id_pedido";

	$res=mysqli_query($conexion,$sql);
	$numero_total=mysqli_fetch_row($res);

	if ($numero_total[0]-$numero_terminado[0]==1) {
	$sql="UPDATE `pedido` SET `Estado_Pedido`='Terminado' WHERE `id_Pedido`=$id_pedido";
	$res=mysqli_query($conexion,$sql);	
	}


$sql="UPDATE `pedido_producto` SET `Estado`='Terminado' WHERE `id_Pedido_Producto`=$row[0]";

	$res=mysqli_query($conexion,$sql);	

	$sql="UPDATE `loteproduccion` SET `Estado`='Terminado' WHERE `id_Lote_Produccion`=$id";

	$res=mysqli_query($conexion,$sql);	

	if ($res==true) {

	}else{

	}



echo "<script>
traer_resumen('$id');
inicio();
</script>";


?>