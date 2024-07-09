<option value="Selecciona">Seleccione</option>
<?php 
include '../include/conexion.php';



             $sql="SELECT * FROM `unidad_medida` order by Unidad";

             $res=mysqli_query($conexion,$sql);

             while($row=mysqli_fetch_row($res))
             {
              ?>
              <option value="<?php echo $row[0] ?>" ><?php echo $row[2] ?>(<?php echo $row[1] ?>)</option>
              <?php
            }
 ?>