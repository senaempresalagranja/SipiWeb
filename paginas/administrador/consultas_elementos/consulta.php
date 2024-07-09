
<div class="row">
  <div class="col-lg-12">
    <h1>Lista de Elementos Registrados</h1>
  </div>
</div>

      <?php
      include '../include/conexion.php';
      $query="SELECT * FROM `elemento` ";
      $criterio=$_POST["criterio"];
      $resource=mysqli_query($conexion,$query);
      $fila=mysqli_fetch_row($resource);
      if ($fila==true) {

        ?>
        <table  class="table table-bordered" id="contenedor_productos"  style=" height:100px; overflow: auto">
     <tr>
            <td><h4><b>Nombre</b></h4></td>
             <td><h4><b>Nombre Comercial</b></h4></td>
        <td><h4><b>Unidad M</b></h4></td>
          <td><h4><b>Empaque</b></h4></td>
           <td><h4><b>Tipo (Elemento)</b></h4></td>
     </tr>


  

 
          <?php

          $sql="SELECT elemento.id_Elemento, elemento.Nombre_Elemento, elemento.Nombre_Comercial, unidad_medida.Unidad, elemento.Tipo_Materia_Prima, empaques.Empaque FROM `elemento`
INNER JOIN unidad_medida ON elemento.id_unidad_medida=unidad_medida.Id_Unidad
INNER JOIN empaques ON elemento.Id_Empaque=empaques.Id_Empaque
where 
elemento.Nombre_Elemento like '%$criterio%' or 
unidad_medida.Unidad like '%$criterio%' or 
elemento.Tipo_Materia_Prima like '%$criterio%'  or
elemento.Nombre_Comercial LIKE '%$criterio%' or
empaques.Empaque LIKE '%$criterio%'
order by Nombre_Elemento
";

          $res=mysqli_query($conexion,$sql);

          while($row=mysqli_fetch_row($res))
          {
            ?>


            <tr  style="border-bottom: 1px solid black;">
              <td><?php echo $row[1]?></td>
              <td><?php echo $row[2]?></td>
              <td><?php echo $row[3]?></td>
              <td><?php echo $row[5]?></td>
                <td><?php echo $row[4]?></td>
                





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
