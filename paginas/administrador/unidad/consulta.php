
<div class="row">
  <div class="col-lg-12">
    <h1>Lista de Unidades Registradas</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="main-wrapper">
      <?php
      include '../include/conexion.php';
      $query="SELECT * FROM `unidad` ";
      $criterio=$_POST["criterio"];
      $resource=mysqli_query($conexion,$query);
      $fila=mysqli_fetch_row($resource);
      if ($fila==true) {

        ?>
        <div class="row" >
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><h4><b>Unidad</b></h4></div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><h4><b>Area</b></h4></div>



          <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><h4><b></b></h4></div>
          <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><h4><b></b></h4></div>
        </div>

        <div class="container-fluid" id="contenedor_productos"  style="height: 300px;  overflow: auto" >
          <?php

          $sql="SELECT unidad.id_Unidad, unidad.Nombre_Unidad, area.Nombre_Unidad FROM `unidad` 
INNER JOIN area ON unidad.id_Area=area.id_Area
WHERE unidad.Nombre_Unidad LIKE '%$criterio%' OR area.Nombre_Unidad LIKE '%$criterio%' order by unidad.Nombre_Unidad";

          $res=mysqli_query($conexion,$sql);

          while($row=mysqli_fetch_row($res))
          {
            ?>


            <div class="row" style="border-bottom: 1px solid black;">
              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row[1]?></div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><h4><b><?php echo $row[2]?></b></h4></div>


              <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <form action="actualizar_criterio.php" method="post">
                  <input type="hidden" name="criterio" value='<?php echo $row[0]?>'>
                  <button class="btn btn-primary" type="submit" title="Editar" > <i class="fa fa-edit "></i></button>
                </form>
              </div>


            </div>
            <?php
          }
          ?>


        </div>
      </div>
    </div>
  </div>
<?php }else{

  echo "<div class='row'>
    <div class='col-md-12'  style='background: red;color: white; width: 60%; border-radius: 5px;
    height: 50px; margin-top: auto; position: relative;'>
    <br>
    No hay Unidades
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
