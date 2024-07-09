<?php 
include '../include/conexion.php';
$id_producto=$_POST["id_producto"];
$ingrediente=$_POST["ingrediente"];
$cantidad=$_POST["cantidad"];

$sql="INSERT INTO `producto_elemento`(`id_Elemento`, `id_Producto`, `Cantidad`) 
	VALUES ('$ingrediente','$id_producto','$cantidad')";

	$res=mysqli_query($conexion,$sql);

	if ($res==true) {

	}else{

	}






?>