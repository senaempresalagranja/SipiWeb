<?php 
include '../include/conexion.php';
$id_producto=$_POST["id_pedido"];
$ingrediente=$_POST["id"];
$cantidad=$_POST["cantidad_ingrediente"];
$unidad_medida=$_POST["id_unidad_medida"];

$sql="SELECT * FROM `pedido_producto` WHERE `id_Producto`=$ingrediente and id_Pedido=$id_producto";
$res=mysqli_query($conexion,$sql);
$respuesta=mysqli_fetch_row($res);
if ($respuesta==false) {

	$sql="INSERT INTO `pedido_producto`( `id_Pedido`, `id_Producto`, `Unidad_Medida`, `Fecha`, `Cantidad`, `Valor_Producto`) VALUES ('$id_producto','$ingrediente','$unidad_medida',NOW(),'$cantidad',0)";

	$res=mysqli_query($conexion,$sql);

	if ($res==true) {


		echo"
		<script type='text/javascript'>
		var cantidad_ingrediente=document.getElementById('cantidad_registrar' + $ingrediente).type='button';
		var cantidad_ingrediente=document.getElementById('cantidad_registrar' + $ingrediente).value='Registro Exitoso';
		traer_resumen('$id_producto');
		";
	}else{

	}
}else{
	$sql="UPDATE `pedido_producto` SET  `Cantidad`=$cantidad WHERE `id_Pedido`=$id_producto and `id_Producto`=$ingrediente";

	$res=mysqli_query($conexion,$sql);

	if ($res==true) {


		echo"
		<script type='text/javascript'>
		var cantidad_ingrediente=document.getElementById('cantidad_registrar' + $ingrediente).type='button';
		var cantidad_ingrediente=document.getElementById('cantidad_registrar' + $ingrediente).value='Actualizacion Exitosa';
		traer_resumen('$id_producto');
		";
	}else{

	}

}










?>