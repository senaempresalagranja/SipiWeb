<?php 
include '../include/conexion.php';
$id_producto=$_POST["id_producto"];
$ingrediente=$_POST["ingrediente"];
$cantidad=$_POST["cantidad"];
$unidad_medida=$_POST["unidad_medida"];

$sql="INSERT INTO `pedido_producto`( `id_Pedido`, `id_Producto`, `Unidad_Medida`, `Fecha`, `Cantidad`, `Valor_Producto`) VALUES ('$id_producto','$ingrediente','$unidad_medida',NOW(),'$cantidad',0)";

	$res=mysqli_query($conexion,$sql);

	if ($res==true) {

	}else{

	}






?>