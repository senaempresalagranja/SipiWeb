<?php 
include '../include/conexion.php';
$id_producto=$_POST["id_producto"];
$ingrediente=$_POST["ingrediente"];
$cantidad=$_POST["cantidad"];
$unidad_medida=$_POST["unidad_medida"];

$sql="INSERT INTO `loteproduccion_elemento`(`id_Lote_Produccion`, `id_Elemento`, `Fecha`, `Cantidad`,Id_Unidad) VALUES ($id_producto,$ingrediente,NOW(),$cantidad,$unidad_medida)";

	$res=mysqli_query($conexion,$sql);

	if ($res==true) {

	}else{

	}






?>