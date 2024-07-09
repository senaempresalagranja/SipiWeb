<?php 
include '../include/conexion.php';
$id=$_POST["id"];
$sql="SELECT `id_Pedido`, unidad.Nombre_Unidad, `Estado_Pedido`,`Fecha_Pedido`, usuarios.Nombre_Usuario FROM `pedido` 
INNER JOIN usuarios ON pedido.Id_Usuario=usuarios.Id_usuario
INNER JOIN unidad ON pedido.id_Unidad=unidad.id_Unidad where id_Pedido=$id";

$res=mysqli_query($conexion,$sql);

$row=mysqli_fetch_row($res);

$estado_pedido=$row[2];
?>
<div class="row">
	<div class="col-md-3">
		<h4 class="help-block"><b>Fecha:</b> <?php echo $row[3] ?></h4>
	</div>
	<div class="col-md-3">
		<?php 
		if ($row[2]=="Registrado") {
			?>
			<h4 class="help-block" title="Ha sido registrado, pero no ha iniciado la produccion" ><b>Estado:</b> <span style="color:red"><?php echo $row[2] ?></span> 
			</h4>
			<?php
		}else{
		?>
			<h4 class="help-block" title="" ><b>Estado:</b> <span style="color:green"><?php echo $row[2] ?></span> 
			</h4>
			<?php	
		}
		?>
	</div>
	<div class="col-md-3">
		<h4 class="help-block"><b>Usuario:</b> <?php echo $row[4] ?></h4>
	</div>
	<div class="col-md-3">
		<h4 class="help-block"><b>Unidad Requerida:</b> <?php echo $row[1] ?></h4>
	</div>
</div>

<div class="row">
	<br>
	<div class="col-md-12 text-center table-responsive">
		<table class="table table-bordered table-condensed table-hover">
			<tr class="warning">
				<td colspan="5"><h3 class="help-block"><i class="icon icon-barcode"></i> Productos
					<?php if ($estado_pedido=="Proceso" OR $estado_pedido=="Registrado"){
 ?>

				 <a href="#" title="Añadir Producto al pedido" onclick="nuevo_producto(),cargar_productos_registrar(<?php echo $id ?>)"><i class="fa fa-plus"></i></a>
				 <?php 
				 } ?>
				</h3></td>
			</tr>
			<tr class="danger">
				<td><b>Nombre Producto (caracteristicas) <i class="icon-barcode"></i></b></td>
					<td><b>Cantidad Pedido<i class="fa fa-sort-numeric-down"></i></b></td>
	
				<td></td>
				<td></td>
			</tr>
			<tr>


				<?php

				$sql="SELECT id_Pedido_Producto, `Nombre_Producto`, empaques.Empaque, Cantidad,unidad_medida.Unidad,Cantidad_Empaque,pedido_producto.Estado FROM pedido_producto
				INNER JOIN producto ON pedido_producto.id_Producto=producto.id_Producto
				INNER JOIN empaques ON producto.id_Empaque=empaques.Id_Empaque
				INNER JOIN unidad_medida ON producto.id_Unidad_Medida=unidad_medida.id_unidad
				where `id_Pedido`=$id";

				$res=mysqli_query($conexion,$sql);

				while($row=mysqli_fetch_row($res))
				{
					?>
					<tr class="table-bordered">
						<td><?php echo " $row[1] $row[2] ($row[4] $row[5])" ?> </td>
							<td><?php echo "$row[3]" ?> </td>
						<?php 
if ($row[6]=="Registrado") {
	?>
		<td>
<!-- 		<form action="comenzar_produccion.php" method="GET">
			<input type="hidden" name="Id" value="<?php echo  $row[0] ?>">
		<button type="submit"  title="Comenzar Produccion"class="btn btn-warning btn-md  fa fa-play">
			
		</button>
	</form> -->
</td>
<!-- <td><button title="Eliminar Producto del Pedido" onclick="eliminar_producto_pedido(<?php echo $row[0] ?>,<?php echo $id ?>)" class="btn btn-danger btn-md"><i class="icon icon-bin"></i></button></td> -->


					</tr> 
<?php 
}else if($row[6]=="Proceso"){

						 ?>
						
						<td colspan="2"><button title="El Producto esta en proceso"  class="btn btn-warning btn-md"><i class="fa fa-cogs"></i></button></td>


					</tr>  
					<?php
				
}else if($row[6]=="Terminado"){

						 ?>
					
						<td colspan="2"><button title="Producto Terminado"  class="btn btn-success btn-md"><i class="fa fa-info-circle"></i></button></td>


					</tr>  
					<?php
				
}else if($row[6]=="Cancelado"){

						 ?>
					
						<td colspan="2"><button title="Producto Cancelado"  class="btn btn-danger btn-md"><i class="fa fa-bell-slash"></i></button></td>


					</tr>  
					<?php
				
}
				}
				?>

			</table>

		</div>
	</div>
<div class="row">

	<div class="col-md-6 text-center">

	</div>


	<!-- EXPORTAR RESUMEN -->
	<form action="exportar_resumen.php" method="post">
		<input type="hidden" name="id" value="<?php echo  $id ?>">
	<div class="col-md-6 text-center"><button type="submit" title="Exportar Resumen" class="btn btn-danger btn-lg fa fa-file-pdf-o"> </button></div>
	</form>
</div>

