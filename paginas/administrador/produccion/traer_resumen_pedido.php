<?php 
include '../include/conexion.php';
$id=$_POST["id"];
$sql="SELECT 
pedido.Fecha_Pedido,
loteproduccion.Fecha_Produccion,
loteproduccion.Estado ,
unidad.Nombre_Unidad,
producto.Nombre_Producto ,
empaques.Empaque,
Cantidad_Empaque,
unidad_medida.Unidad,
usuarios.Nombre_Usuario,
loteproduccion.Cantidad
FROM loteproduccion 
INNER JOIN pedido_producto ON loteproduccion.id_Pedido_Producto=pedido_producto.id_Pedido_Producto
INNER JOIN producto ON pedido_producto.id_Producto=producto.id_Producto
INNER JOIN pedido on pedido_producto.id_Pedido=pedido.id_Pedido
INNER JOIN unidad on pedido.id_Unidad=unidad.id_Unidad
INNER JOIN usuarios on pedido.Id_Usuario=usuarios.Id_usuario
INNER JOIN empaques ON producto.id_Empaque=empaques.Id_Empaque
INNER JOIN unidad_medida ON producto.id_Unidad_Medida=unidad_medida.Id_Unidad
WHERE loteproduccion.id_Lote_Produccion=$id";

$res=mysqli_query($conexion,$sql);

$row=mysqli_fetch_row($res);
?>
<div class="row">
	<div class="col-md-12 text-center">
		<h2 >Informacion de Pedido <i class="fa fa-phone"></i></h2>
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<h4 class="help-block"><b>Fecha Pedido:</b> <?php echo $row[0] ?></h4>
	</div>	
	<div class="col-md-4">
		<h4 class="help-block"><b>Fecha Inicio Produccion:</b> <?php echo $row[1] ?></h4>
	</div>
	<div class="col-md-4">

		<h4 class="help-block" title="" ><b>Unidad :</b> <span ><?php echo $row[3] ?></span> 
		</h4>


	</div>
	
	
</div>
<div class="row">
	<div class="col-md-3">
		<h4 class="help-block"><b>Usuario:</b> <?php echo $row[8] ?></h4>
	</div>
		<div class="col-md-9">
		<h4 class="help-block"><b>Producto:</b> <?php echo "$row[4] $row[5] ($row[6] $row[7]) X $row[9]" ?></h4>
	</div>
</div>
<div class="row">
	<br>
	<div class="col-md-12 text-center table-responsive">
		<table class="table table-bordered table-condensed table-hover">
			<tr class="warning">
				<td colspan="5"><h3 class="help-block"><i class="fa fa-list"></i> Elementos 
		<!-- 			<a href="#" title="Añadir Producto al pedido" onclick="nuevo_producto(),cargar_productos_registrar(<?php echo $id ?>)"><i class="fa fa-plus"></i></a> -->
				</h3></td>
			</tr>
			<tr class="danger">
				<td><b>Nombre Elemento</b></td>
				<td><b>Unidad Medida</b></td>

				<td><b>Cantidad Necesaria<i class="fa fa-sort-numeric-down"></i></b></td>

				<!-- <td></td> -->
				
			</tr>
			<tr>


				<?php

				$sql="SELECT elemento.Nombre_Elemento, unidad_medida.Unidad, loteproduccion_elemento.Cantidad FROM `loteproduccion_elemento` 
INNER JOIN elemento on loteproduccion_elemento.id_Elemento=elemento.id_Elemento
INNER JOIN unidad_medida ON loteproduccion_elemento.Id_Unidad=unidad_medida.Id_Unidad
WHERE loteproduccion_elemento.id_Lote_Produccion=$id";

				$res=mysqli_query($conexion,$sql);

				while($row1=mysqli_fetch_row($res))
				{
					?>
					<tr class="table-bordered">
						<td><?php echo "$row1[0]" ?> </td>
						<td><?php echo " $row1[1]" ?> </td>
						<td><?php echo "$row1[2]" ?> </td>
				<!-- 	<td><button title="Eliminar Producto del Pedido" onclick="eliminar_producto_pedido(<?php echo $row[0] ?>,<?php echo $id ?>)" class="btn btn-danger btn-md"><i class="icon icon-bin"></i></button></td> -->
					<?php
		}
		?>

	</table>

</div>
</div>
<div class="row">
	<div class="col-md-6 text-center">
<form action="exportar_resumen.php" method="post">
	<input type="hidden" name="id" value="<?php echo  $id ?>">
	<div class="col-md-6 text-center"><button type="submit" title="Exportar Resumen" class="btn btn-danger btn-lg fa fa-file-pdf-o"> </button></div>
</form>
</div>
<?php if ($row[2]=="Terminado") {

} else{?>
	<div class="col-md-6 text-center"><button type="submit" title="FINALIZAR PRODUCCION" class="btn btn-success btn-lg fa fa-power-off" onclick="finalizar_produccion(<?php echo  $id ?>)"></button></div>
<!-- EXPORTAR RESUMEN -->

</div>
<?php 
}