 <table  class="table table-bordered table-hover" id="contenedor_productos"  style=" height:100px; overflow: auto">
   <tr class="danger">
  <td><h4>Unidad Requerida</h4></td>
  <td><h4>Estado del Pedido</h4></td>
  <td><h4>Fecha</h4></td>
  <td><h4>Usuario</h4></td>
    <td><h4></h4></td>
  </tr>
<?php
include '../include/conexion.php';

$Fecha_1=$_POST["Fecha_1"];
$Fecha_2=$_POST["Fecha_2"];
 $sql="SELECT `id_Pedido`, unidad.Nombre_Unidad, `Estado_Pedido`,`Fecha_Pedido`, usuarios.Nombre_Usuario FROM `pedido` 
  INNER JOIN usuarios ON pedido.Id_Usuario=usuarios.Id_usuario
  INNER JOIN unidad ON pedido.id_Unidad=unidad.id_Unidad
where Fecha_Pedido between  '$Fecha_1' and '$Fecha_2' order by Fecha_Pedido desc ";

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
    if ($row[2]=="Registrado") {
      ?>
      <td class="">
        <h4 title="Ha sido registrado, pero no ha iniciado la produccion" style="background: red; color: white; border-radius: 50px;">
         <?php echo $row[2] ?> <i class="fa fa-warning "></i>
       </h4>
       <?php
     }else if ($row[2]=="Proceso"){


      $sql="SELECT COUNT(Estado) FROM `pedido_producto` WHERE Estado='Proceso' and id_Pedido=$row[0] GROUP BY id_Pedido";

      $res=mysqli_query($conexion,$sql);
      $row1=mysqli_fetch_row($res);
      $numero_proceso=$row1[0];

      $sql="SELECT COUNT(Estado) FROM `pedido_producto` WHERE Estado='Terminado' and id_Pedido=$row[0] GROUP BY id_Pedido";

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
      <td title="Se han terminado <?php echo $numero_terminado  ?> Productos del Pedido" >
       <label for='' style='' ><i class="fa fa-cogs"></i> El pedido Casi Terminado</label>
       <div class='progress'>
        <div class='progress-bar ' role='progressbar' style='width: <?php echo $porcentaje_terminado ?>%; min-width:0%; background:<?php echo $fondo ?>;' >
          <label><?php echo "$numero_terminado de $numero_total" ?></label>
        </div>
        <br/><hr/>
      </div>
      <?php
      
      
    }else{
     ?>
     <td title="Se estan Procesando <?php echo $numero_proceso  ?> Productos del Pedido" >
       <label for='' style='' ><i class="fa fa-cogs"></i> El pedido esta en  Proceso</label>
       <div class='progress'>
        <div class='progress-bar ' role='progressbar' style='width: <?php echo $porcentaje ?>%; min-width:0%; background:<?php echo $fondo ?>;' >
          <label><?php echo "$numero_proceso de $numero_total" ?></label>
        </div>
        <br/><hr/>
      </div>
      <?php
    }

  }else     if ($row[2]=="Terminado") {
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
  }else     if ($row[2]=="Cancelado") {
        ?>
      <td title="Pedido Cancelado" >
       <label for='' style='' ><i class="fa fa-bell-slash"></i> Pedido Cancelado</label>
       <div class='progress'>
        <div class='progress-bar ' role='progressbar' style='width:100%; min-width:0%; background:red;' >
          <label>Cancelado</label>
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
<!-- <td>
  <button class="btn btn-danger btn-xs" title="Eliminar Pedido Completo" onclick="Eliminar_pedido_completo(<?php echo $row[0] ?>)"><h4><i class="icon icon-bin"></i></h4></button>
</td> -->
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
</table>