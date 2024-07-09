<?php 
include '../include/conexion.php';
$id=$_POST["id"];

$sql="SELECT * FROM `pedido_producto` 
INNER JOIN pedido ON pedido_producto.id_Pedido=pedido.id_Pedido
WHERE pedido.id_Pedido=$id and ( pedido.Estado_Pedido='Proceso' OR pedido.Estado_Pedido='Terminado' OR pedido.Estado_Pedido='Cancelado' ) GROUP by pedido.id_Pedido";
$res=mysqli_query($conexion,$sql);

$row=mysqli_fetch_row($res);
if ($row==true) {
?>
<script type="text/javascript">
swal('Error','No se puede Eliminar el pedido porque ya esta en produccion o ha sido Cancelado','error')
</script>
<?php 
}else{
	$sql="DELETE FROM `pedido` WHERE `id_Pedido`=$id";

$res=mysqli_query($conexion,$sql);

$sql="DELETE FROM `pedido_producto` WHERE `id_Pedido`=$id";

$res=mysqli_query($conexion,$sql);
?>
<script type="text/javascript">
	inicio();
</script>
<?php 
}


