<tr class="danger">

  <td><h4>Unidad Requerida</h4></td>
  <td><h4>Estado del Pedido</h4></td>
  <td><h4>Fecha</h4></td>
  <td><h4>Usuario</h4></td>
  <td></td>

</tr>
<?php
include '../include/conexion.php';

$criterio=$_POST["criterio"];
$id_unidad=$_POST["id_unidad"];

$sql="SELECT `id_Pedido`, unidad.Nombre_Unidad, `Estado_Pedido`,`Fecha_Pedido`, usuarios.Nombre_Usuario FROM `pedido` 
INNER JOIN usuarios ON pedido.Id_Usuario=usuarios.Id_usuario
INNER JOIN unidad ON pedido.id_Unidad=unidad.id_Unidad
where Estado_Pedido='Terminado' or Estado_Pedido='Trasladando' or Estado_Pedido='Trasladado'
order by Fecha_Pedido desc
";

$res1=mysqli_query($conexion,$sql);
$rows=mysqli_num_rows($res1);
if ($rows>0) {


  while($row=mysqli_fetch_row($res1))
  {
    ?>
    <tr class="text-center">
     <td class="">
      <h4><?php echo $row[1] ?></h4>
    </td>

    <?php 
  if ($row[2]=="Trasladando"){


      $sql="SELECT COUNT(Estado) FROM `pedido_producto` WHERE Estado='Proceso' and id_Pedido=$row[0] GROUP BY id_Pedido";

      $res=mysqli_query($conexion,$sql);
      $row1=mysqli_fetch_row($res);
      $numero_proceso=$row1[0];

      $sql="SELECT COUNT(Estado) FROM `pedido_producto` WHERE Estado='Trasladado' and id_Pedido=$row[0] GROUP BY id_Pedido";

      $res=mysqli_query($conexion,$sql);
      $row1=mysqli_fetch_row($res);
      $numero_terminado=$row1[0];

      $sql="SELECT COUNT(Estado) FROM `pedido_producto`  where id_Pedido=$row[0] GROUP BY id_Pedido";

      $res=mysqli_query($conexion,$sql);
      $row1=mysqli_fetch_row($res);
      $numero_total=$row1[0];
      $porcentaje=(100/$numero_total)*$numero_proceso;
      $porcentaje_terminado=(100/$numero_total)*$numero_terminado;
      if ($porcentaje<=50) {
        $fondo="#ff0000";
      }else if ($porcentaje>50 && $porcentaje<100) {
       $fondo="#ff8c00";
     }else{
       $fondo="#75cc63";
     }

     if ($numero_terminado>0) {
      ?>
      <td title="Se han Trasladado <?php echo $numero_terminado  ?> Productos del Pedido" >
       <label for='' style='' ><i class="fa fa-cogs"></i> El pedido se esta Trasladando</label>
       <div class='progress'>
        <div class='progress-bar ' role='progressbar' style='width: <?php echo $porcentaje_terminado ?>%; min-width:0%; background:<?php echo $fondo ?>;' >
          <label><?php echo "$numero_terminado de $numero_total" ?></label>
        </div>
        <br/><hr/>
      </div>
      <?php
      
      
    }else{
     ?>
     <td title="Se han Trasladado <?php echo $numero_proceso  ?> Productos del Pedido" >
       <label for='' style='' ><i class="fa fa-cogs"></i> El pedido esta Trasladando</label>
       <div class='progress'>
        <div class='progress-bar ' role='progressbar' style='width: <?php echo $porcentaje ?>%; min-width:0%; background:<?php echo $fondo ?>;' >
          <label><?php echo "$numero_proceso de $numero_total" ?></label>
        </div>
        <br/><hr/>
      </div>
      <?php
    }

  }
else     if ($row[2]=="Terminado") {
        ?>
      <td title="Se han terminado Productos del Pedido" >
       <label for='' style='' ><i class="fa fa-cogs"></i>Pedido Terminado</label>
       <div class='progress'>
        <div class='progress-bar ' role='progressbar' style='width:100%; min-width:0%; background:green;' >
          <label>100% Terminado</label>
        </div>
        <br/><hr/>
      </div>
      <?php
  }else {

         ?>
      <td title="Se han terminado Productos del Pedido" >
       <label for='' style='' ><i class="fa fa-cogs"></i>Pedido Trasladado</label>
       <div class='progress'>
        <div class='progress-bar ' role='progressbar' style='width:100%; min-width:0%; background:green;' >
          <label><b><i>100% TRASLADADO</i></b></label>
        </div>
        <br/><hr/>
      </div>
      <?php 
  }
  
    ?>

</td>
<td class="">
  <h4><?php echo $row[3] ?></h4>
</td>
<td class="">
 <h4> <?php echo $row[4] ?></h4>
</td>
<td>
  <button class="btn btn-success btn-xs" title="Resumen Pedido" onclick="mostrar_poup(), traer_resumen(<?php echo $row[0] ?>)"><h4><i class="fa fa-eye"></i></h4></button>
</td>

</tr>  
<?php

}



}else{
  ?>

  <tr>
    <td colspan="6">No hay Pedidos Registrados</td>
  </tr>

  <?php  
}
?>
