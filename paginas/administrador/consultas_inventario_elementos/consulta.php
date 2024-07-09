<div class="row">
<br><br>
    <div class="col-md-12">
        <div class="main-wrapper">
<?php 
$producto=$_POST["producto"];
include '../include/conexion.php';
$query="SELECT * FROM `elemento` ";
$resource=mysqli_query($conexion,$query);   
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
    
 ?>
<div class="row">
     <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><h3><b>Nombre</b></h3></div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h3><b>Disponible</b></h3></div>
       <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
</div>
<div class="container-fluid"  style="height: 400px; overflow: auto; ">
    <?php



    $sql="SELECT elemento.id_Elemento, elemento.Nombre_Elemento, SUM(novedades.Cantidad) as disponible, elemento.Stock FROM `novedades` INNER JOIN elemento ON novedades.id_Elemento=elemento.id_Elemento where elemento.Nombre_Elemento like '%$producto%' GROUP BY elemento.Nombre_Elemento order by elemento.Nombre_Elemento";

    
    $res=mysqli_query($conexion,$sql);



    while($row=mysqli_fetch_array($res))
    {

   if ($row[2]<=$row[3]) {
    echo "<div class='row danger' style='border-bottom: 1px solid black; background:#c92c2e; color:white;'>";
   }else{
    echo "<div class='row' style='border-bottom: 1px solid black;'>";
   }

     ?>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" ><?php echo $row[1]?></div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" ><?php echo $row[2]?></div>


       <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

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
No Hay Elementos
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