<tr class="danger">

  <td><h4>Unidad Requerida</h4></td>
    <td><h4>Producto a Producir</h4></td>
  <td><h4>Estado de la Produccion</h4></td>
  <td><h4>Fecha Inicio Produccion</h4></td>
  <td><h4>Usuario</h4></td>
  <td></td>
 

</tr>
<?php
include '../include/conexion.php';

$criterio=$_POST["criterio"];
$id_unidad=$_POST["id_unidad"];

$sql="SELECT loteproduccion.id_Lote_Produccion, unidad.Nombre_Unidad,loteproduccion.Estado, usuarios.Nombre_Usuario ,loteproduccion.Fecha_Produccion,producto.Nombre_Producto ,  empaques.Empaque, Cantidad_Empaque,unidad_medida.Unidad FROM loteproduccion 
INNER JOIN pedido_producto ON loteproduccion.id_Pedido_Producto=pedido_producto.id_Pedido_Producto
INNER JOIN producto ON pedido_producto.id_Producto=producto.id_Producto
INNER JOIN pedido on pedido_producto.id_Pedido=pedido.id_Pedido
INNER JOIN unidad on pedido.id_Unidad=unidad.id_Unidad
INNER JOIN usuarios on pedido.Id_Usuario=usuarios.Id_usuario
INNER JOIN empaques ON producto.id_Empaque=empaques.Id_Empaque
INNER JOIN unidad_medida ON producto.id_Unidad_Medida=unidad_medida.Id_Unidad
order by Fecha_Produccion desc
";

$res1=mysqli_query($conexion,$sql);
$rows=mysqli_num_rows($res1);
if ($rows>0) {


  while($row=mysqli_fetch_row($res1))
   
  {
     if ($row[2]=="Proceso") {
      $clase="warning";
    }else if($row[2]=="Terminado")
    {
  $clase="success";
    }
    ?>
    <tr class="text-center ">
     <td class="">
      <h4><?php echo $row[1] ?></h4>
    </td>
  <td class="">
      <h4><?php echo "$row[5] $row[6] ($row[7]-$row[8])" ?></h4>
    </td>
<td class="<?php echo $clase ?>">
  <h4><?php echo $row[2] ?></h4>
</td>
</td>
<td class="">
  <h4><?php echo $row[4] ?></h4>
</td>
<td class="">
 <h4> <?php echo $row[3] ?></h4>
</td>
<td>
  <button class="btn btn-success btn-xs" title="Resumen Produccion" onclick="mostrar_poup(), traer_resumen(<?php echo $row[0] ?>)"><h4><i class="fa fa-eye"></i></h4></button>
</td>

</tr>  
<?php

}



}else{
  ?>

  <tr>
    <td colspan="6">No hay Producciones</td>
  </tr>

  <?php  
}
?>
