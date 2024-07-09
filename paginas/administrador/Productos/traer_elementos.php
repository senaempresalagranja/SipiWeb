
      <?php
      include '../include/conexion.php';
    
$criterio=$_POST["criterio"];
   
          $sql="SELECT * FROM `elemento` where    Nombre_Elemento  like '%$criterio%' or Nombre_Comercial  like '%$criterio%' order by Nombre_Elemento";

          $res=mysqli_query($conexion,$sql);

          while($row=mysqli_fetch_row($res))
          {
            ?>
            <tr class="table-bordered">
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
