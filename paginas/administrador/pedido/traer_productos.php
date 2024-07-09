<tr>
  
<td>Nombre Producto</td>

</tr>
      <?php
      include '../include/conexion.php';
    
$criterio=$_POST["criterio"];
$id_unidad=$_POST["id_unidad"];

          $sql="SELECT `id_Producto`, `Nombre_Producto`, empaques.Empaque, Cantidad_Empaque,unidad_medida.Unidad FROM `producto`
INNER JOIN empaques ON producto.id_Empaque=empaques.Id_Empaque
INNER JOIN unidad_medida ON producto.id_Unidad_Medida=unidad_medida.id_unidad
WHERE producto.id_Unidad=$id_unidad AND (Nombre_Producto like '%$criterio%') order by Nombre_Producto";

          $res=mysqli_query($conexion,$sql);

          while($row=mysqli_fetch_row($res))
          {
            ?>
            <tr class="table-bordered">
             <td class="">
                                <input type="checkbox" class="btn btn-danger " id="check_poup<?php echo $row[0]  ?>"  onclick="agregar_check(<?php echo $row[0] ?>,<?php echo  "'$row[1]','$row[2]','$row[3]','$row[4]'" ?>)"><?php echo " $row[1] ($row[2]-$row[3] $row[4])" ?> 
                            

             </td>
           
           </tr>  
           <?php
           echo "<script>
chekear_auto($row[0]);
           </script>";
         }
         ?>
