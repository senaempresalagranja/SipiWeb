<?php 
include '../include/conexion.php';
$id_producto_pedido=$_POST["id_producto_pedido"];

$sql="SELECT pedido.id_Unidad,pedido_producto.id_Pedido, pedido_producto.id_Producto,pedido_producto.Cantidad FROM `pedido_producto`
INNER JOIN pedido ON pedido_producto.id_Pedido=pedido.id_Pedido
 WHERE `id_Pedido_Producto`=$id_producto_pedido";

$res=mysqli_query($conexion,$sql);

$fila=mysqli_fetch_row($res);
$id_Pedido=$fila[1];
$query="INSERT INTO `traslado`(
`id_Unidad`,
`id_Pedido`,
`Fecha_Traslado`,
`id_Producto`,
`Catidad`) VALUES (
$fila[0],
$fila[1],
now(),
$fila[2],
$fila[3]
)";

$resource=mysqli_query($conexion,$query);
$query="UPDATE `pedido_producto` SET `Estado`='Trasladado' WHERE `id_Pedido_Producto`='$id_producto_pedido'";

$resource=mysqli_query($conexion,$query);

$query="SELECT COUNT(Estado='Trasladado') FROM `pedido_producto` WHERE `id_Pedido`=$id_Pedido and Estado='Trasladado'
GROUP BY `Estado`
";

$resource=mysqli_query($conexion,$query);
$traslado=mysqli_fetch_row($resource);

 $query="SELECT COUNT(Estado) FROM `pedido_producto` WHERE `id_Pedido`=$id_Pedido
";

  $resource=mysqli_query($conexion,$query);
  $terminado=mysqli_fetch_row($resource);
  if ($traslado[0]==$terminado[0]) {
  	$query="UPDATE `pedido` SET `Estado_Pedido`='Trasladado' WHERE `id_Pedido`=$id_Pedido";
  	$resource=mysqli_query($conexion,$query);
  }else{
  	$query="UPDATE `pedido` SET `Estado_Pedido`='Trasladando' WHERE `id_Pedido`=$id_Pedido";
  	$resource=mysqli_query($conexion,$query);
  }


if ($resource==true) {
	echo "<script>
inicio();
traer_resumen('$id_Pedido');
	</script>";
}
?>