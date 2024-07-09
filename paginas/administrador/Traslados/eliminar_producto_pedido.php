<?php 
include '../include/conexion.php';
$id_producto_pedido=$_POST["id_producto_pedido"];
$id_pedido=$_POST["id_pedido"];

$sql="SELECT COUNT(id_Pedido) FROM `pedido_producto` WHERE id_Pedido=$id_pedido";

$res=mysqli_query($conexion,$sql);
$numero_productos=mysqli_fetch_row($res);

if ($numero_productos[0]==1) {
	echo "<script>
swal('Advertencia','No se puede eliminar este producto, mediante que el pedido quedaria sin productos','warning');

	</script>";
}else{

$sql="DELETE FROM `pedido_producto` WHERE `id_Pedido_Producto`=$id_producto_pedido";

$res=mysqli_query($conexion,$sql);

if ($res==true) {
		echo "<script>
// swal('Eliminado','El producto se ha eliminado del pedido','warning');
traer_resumen('$id_pedido');
inicio();
	</script>";
	}	
}