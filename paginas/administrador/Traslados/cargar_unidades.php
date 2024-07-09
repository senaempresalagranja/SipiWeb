  <option class="btn" value="Selecciona">Selecciona Unidad</option>
<?php 
include '../include/conexion.php';

$id_area=$_POST["id_area"];

             $sql="SELECT * FROM `unidad` where id_Area=$id_area";

             $res=mysqli_query($conexion,$sql);

             while($row=mysqli_fetch_row($res))
             {
              ?>
              <option value="<?php echo $row[0] ?>" onclick="cambiar_btn(<?php echo "'$row[1]'" ?>)"><?php echo $row[1] ?></option>
              <?php
            }
 ?>