
<?php 
include '../include/conexion.php';

$id=$_POST["id"];
      $sql="SELECT  `id_Unidad_Medida`FROM `producto` WHERE `id_Producto`=$id ";

             $res=mysqli_query($conexion,$sql);

             $row=mysqli_fetch_row($res);




             $sql="SELECT * FROM `unidad_medida` where unidad_medida.Id_Unidad=$row[0]";

             $res=mysqli_query($conexion,$sql);

             while($row=mysqli_fetch_row($res))
             {
              ?>
              <option value="<?php echo $row[0] ?>" ><?php echo $row[2] ?>(<?php echo $row[1] ?>)</option>
              <?php
            }
 ?>