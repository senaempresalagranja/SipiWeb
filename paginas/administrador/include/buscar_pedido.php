      
<?php 
include '../include/conexion.php';
$query="SELECT 
day(`Fecha_Pedido`),month(Fecha_Pedido), MINUTE(`Fecha_Pedido`), second(`Fecha_Pedido`), hour(`Fecha_Pedido`),
day(NOW()),month(NOW()), MINUTE(NOW()), second(NOW()), hour(NOW())
FROM `pedido` WHERE  `Estado_Pedido`='Registrado'

";
$resource=mysqli_query($conexion,$query);
$numero=mysqli_num_rows($resource);
while ($fila=mysqli_fetch_row($resource)) {
	?>



	<?php 
}

?>
<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
	<i class="fa fa fa-bullhorn"></i>
	<span class="badge bg-green"><?php echo $numero ?></span>
</a>
<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
	<?php 
	include '../include/conexion.php';
	$query="SELECT 
	day(`Fecha_Pedido`),month(Fecha_Pedido), MINUTE(`Fecha_Pedido`), second(`Fecha_Pedido`), hour(`Fecha_Pedido`),
	day(NOW()),month(NOW()), MINUTE(NOW()), second(NOW()), hour(NOW())
	FROM `pedido` WHERE  `Estado_Pedido`='Registrado'
	order by Fecha_Pedido desc";
	$resource=mysqli_query($conexion,$query);

	while ($fila=mysqli_fetch_row($resource)) {

		$hace_minutos=$fila[7]-$fila[2];
		$hace_segundos=$fila[8]-$fila[3];
		$hace_horas=$fila[9]-$fila[4];
		$hace_dias=$fila[5]-$fila[0];
		$hacem_meses=$fila[6]-$fila[1];




		if ($hacem_meses==0) {
			if ($hace_dias==0) {

				if ($hace_horas==0) {

					if ($hace_minutos==0) {

						if ($hace_segundos==0) {

						}else{
							$leyenda="Aprox $hace_segundos Segundos";
						}
					}else{
						$leyenda="Aprox $hace_minutos minuto(s)";
					}
				}else{
					$leyenda="Aprox $hace_horas hora(s)";
				}

			}else{
				$leyenda="Aprox $hace_dias Dia(s) y $hace_horas hora(s)";
			}
		}else{
			$leyenda="Aprox $hacem_meses Mes(es)";

		}



		?>

		<li>
			<a href="../pedido/pedidos.php">
				<span class="image" title=""><img src="../../../images/bell_4256.png" alt="Profile Image" /></span>
				<span>

					<span>Nuevo Pedido</span>
					<span class="time"><?php echo $leyenda ?></span>
				</span>
				<span class="message">
					Nuevo Pedido Registrado
				</span>
			</a>
		</li>

		<?php 
	}

	?>


</ul>

