	<table class="table table-bordered table-hover">
<tr class="success">
	<td>Nombre Elemento</td>

</tr>
							<?php  
							include '../include/conexion.php';  
							$sql="SELECT * FROM `elemento` order by Nombre_Elemento";

							$res=mysqli_query($conexion,$sql);

							while($row=mysqli_fetch_row($res))
							{

								?>
								<tr class="table-bordered" id="">
									<td class="">
										<input type="checkbox" class="btn btn-danger " id="check_poup<?php echo $row[0]  ?>"  onclick="agregar_check(<?php echo $row[0] ?>,<?php echo  "'$row[1]'" ?>)"><?php echo " $row[1]" ?> 


									</td>

								</tr>  
								<?php 
echo "<script>
			
chekear_auto($row[0]);
           </script>";
							}
						
							?>
						</table>