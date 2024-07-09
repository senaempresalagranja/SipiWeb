<tr class="danger">
  <td>Producto (Caracterisitcas)</td>
  <td>Cantidad del Producto</td>
  <td></td>
</tr>
      <?php
      include '../include/conexion.php';

$id=$_POST["id"];

          $sql="SELECT `id_Unidad` FROM `pedido` WHERE `id_Pedido`=$id";

          $res=mysqli_query($conexion,$sql);
      $id_unidad=mysqli_fetch_row($res);


          $sql="SELECT `id_Producto`, `Nombre_Producto`, empaques.Empaque, Cantidad_Empaque,unidad_medida.Unidad,unidad_medida.Id_Unidad FROM `producto`
INNER JOIN empaques ON producto.id_Empaque=empaques.Id_Empaque
INNER JOIN unidad_medida ON producto.id_Unidad_Medida=unidad_medida.id_unidad
order by Nombre_Producto";

          $res=mysqli_query($conexion,$sql);

          while($row=mysqli_fetch_row($res))
          {
            ?>
            <tr class="table-bordered">
             <td class="">
<?php echo " $row[1] ($row[2]-$row[3] $row[4])" ?> 
             </td>
             <td><input type="number" onkeyup="validar_cantidad(<?php echo "$row[0]"; ?>)" name="" id="cantidad_registrar<?php echo $row[0] ?>" class="form-control" ></td>
           <td><button type="button" title="Registrar" onclick="registrar_producto_pedido(<?php echo "$row[0]"; ?>,<?php echo $id ?>,<?php echo $row[5] ?>)" class="btn btn-md"><h1 class="fa fa-mail-forward"></h1></button></td>
           </tr>  
           <?php
           echo "<script>
chekear_auto($row[0]);
           </script>";
         }
         ?>
