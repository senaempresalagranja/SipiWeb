<?php 
include '../include/conexion.php';
$producto=$_POST["producto"];


$query12="SELECT * FROM `elemento` ";
$resource3=mysqli_query($conexion,$query12);
$fila12=mysqli_fetch_row($resource3);
if ($fila12==false) {
	 echo "<div class='row'>
	 <br>
	 <br>
	 <br>
  <div class='col-md-12'  style='background: red;color: white; width: 60%; border-radius: 5px;
  height: 50px; margin-top: auto; position: relative;'>
    <br>
No hay Materia Prima  en la base de datos
    <br>
  </div>
</div>";
}else{
 ?>


 <br>
 <br>
 <br>
 <div class="row">
 	<div class="col-lg-12">
 		<table class="table table-bordered table-hover table-responsive">
 		<tr>
 		
 			<th>Nombre</th>
 			<th>En Inventario</th>
 			<th colspan="3">Cantidad</th>
 	<th>Unidad Medida</th>
 		<th>Costo Abastecimiento</th>
 	
</tr>
 			<?php 

$query="SELECT elemento.id_Elemento,elemento.Nombre_Elemento, SUM(novedades.Cantidad) AS existencias,elemento.stock FROM `novedades` INNER JOIN elemento ON novedades.id_Elemento=elemento.id_Elemento where  elemento.Nombre_Elemento LIKE '%$producto%' GROUP by elemento.id_Elemento ";

$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {
	if ($fila[2]<=$fila[3]) {
		?> 
	<tr class='danger' id="<?php echo "contenedor_" . $fila[0]; ?>">
	<?php 
	}else{
	?> 
	<tr  id="<?php echo "contenedor_" . $fila[0]; ?>">
	<?php 
	}
?>


<td><?php echo "$fila[1]";?> </td>
<td><?php echo "$fila[2]";?> </td>


<td colspan="3" >
<div >
<input type="hidden"  id="<?php echo $fila[0]; ?>" value="<?php echo $fila[0]; ?>">
<input type="number"  class="form-control"  id="<?php echo "cantidad_abastecimiento" . $fila[0]; ?>">
</div>
</td>
<td> <select name="" id="id_unidad_medida<?php echo $fila[0]  ?>" title="unidad de medida" class="form-control has-feedback-left">
               <option class="btn" value="Selecciona">Selecciona Unidad de Medida</option>

               <?php 
               $sql="SELECT * FROM `unidad_medida` ";

               $res=mysqli_query($conexion,$sql);

               while($row=mysqli_fetch_row($res))
               {
                ?>
                <option value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>
                <?php
              }
              ?>
            </select></td>
            <td><input type="number"  class="form-control"  id="<?php echo "costo" . $fila[0]; ?>"></td>
<td>

<button type="button" onclick="validar(<?php echo $fila[0] ?>)"  class="btn btn-primary"> <i class="icon  icon-redo2"></i>Agregar</button>
</td>



</tr>
<?php 
}

}
 			 ?>
 		</table>


 	</div>
 </div>