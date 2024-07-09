
<div class="row">
  <div class="col-lg-12">
    <h1>Lista de Productos Registrados</h1>
  </div>
</div>

      <?php
      include '../include/conexion.php';
      $query="SELECT * FROM `producto` ";
      $criterio=$_POST["criterio"];

      $resource=mysqli_query($conexion,$query);
      $fila=mysqli_fetch_row($resource);
      if ($fila==true) {

        ?>
        <table  class="table table-bordered" id="contenedor_productos"  style=" height:100px; overflow: auto">
     <tr>
            <td ><h4><b>NOMBRE</b></h4></td>
             <td ><h4><b>PRESENTACION</b></h4></td>
        <td ><h4><b>CANTIDAD EN PRESENTACION</b></h4></td>
        
           <td ><h4><b>UNIDAD MEDIDA</b></h4></td>
     </tr>


  

 
          <?php

          $sql="SELECT `id_Producto`, `Nombre_Producto`, empaques.Empaque, Cantidad_Empaque,unidad_medida.Unidad FROM `producto`
INNER JOIN empaques ON producto.id_Empaque=empaques.Id_Empaque
INNER JOIN unidad_medida ON producto.id_Unidad_Medida=unidad_medida.id_unidad
WHERE Nombre_Producto like '%$criterio%' OR empaques.Empaque like '%$criterio%' OR  unidad_medida.Unidad like '%$criterio%'  order by Nombre_Producto
";

          $res=mysqli_query($conexion,$sql);

          while($row=mysqli_fetch_row($res))
          {
            ?>


            <tr  style="border-bottom: 1px solid black;">
              <td ><?php echo $row[1]?></td>
              <td ><?php echo $row[2]?></td>
              <td ><?php echo $row[3]?></td>
                <td ><?php echo $row[4]?></td>
            
                





            </tr>
            <?php
          }
          ?>

</table>

<?php }else{

  echo "<div class='row'>
    <div class='col-md-12'  style='background: red;color: white; width: 60%; border-radius: 5px;
    height: 50px; margin-top: auto; position: relative;'>
    <br>
    No hay Elementos
    <br>
  </div>
</div>";


} ?>

<style type="text/css">

  ul.paginador
  {

  }
  ul.paginador li
  {
    float:left;
  }
  ul.paginador li a
  {
    float:left;
  }
  ul.paginador li.paginador-active a, ul.paginador li a:hover
  {
    background-color: #337ab7;
    border-color: #337ab7;
    color:#FFFFFF;
  }
  ul.paginador li.paginador-disabled a, ul.paginador li.paginador-disabled a:hover
  {
    cursor:default;
  }
  ul.paginador li.paginador-current
  {
  }
</style>
