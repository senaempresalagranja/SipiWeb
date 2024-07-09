<?php 


include '../include/conexion.php';

$id_historial=$_REQUEST["id_historial"];
$id_ventas=$_REQUEST["id_ventas"];
$id_producto=$_REQUEST["id_producto"];

if ($id_ventas==NULL) {
	$query="DELETE FROM `novedades` WHERE Id_Novedad=$id_historial";
	$resource=mysqli_query($conexion,$query);
	if ($resource==true) {
		header("Location: historial_producto.php?id_producto=$id_producto");	
	}else{
		echo "Error Al eliminar";
	}

}else{
	echo "Es una Salida";

	$query="DELETE FROM `ventas` WHERE Id_Ventas=$id_ventas";
	$resource=mysqli_query($conexion,$query);


	$query="DELETE FROM `novedades` WHERE Id_Novedad=$id_historial";
	$resource1=mysqli_query($conexion,$query);

	if ($resource==true && $resource1==true) {
		header("Location: historial_producto.php?id_producto=$id_producto");	
	}else{

		echo "Error";
	}
	
}




?>