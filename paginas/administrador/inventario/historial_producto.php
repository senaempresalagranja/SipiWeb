<?php 
include '../include/conexion.php';


$id_producto=$_REQUEST["id_producto"];


$query="SELECT elemento.Nombre_Elemento, SUM(Cantidad) as disponible FROM `novedades` INNER JOIN elemento ON novedades.id_Elemento=elemento.id_Elemento 
where novedades.id_Tipo_Novedad=1 AND elemento.id_Elemento=$id_producto";
$resource=mysqli_query($conexion,$query);   
$entradas=mysqli_fetch_row($resource);


$query="SELECT  SUM(Cantidad) as disponible FROM `novedades` INNER JOIN elemento ON novedades.id_Elemento=elemento.id_Elemento where elemento.id_Elemento=$id_producto GROUP BY elemento.id_Elemento";
$resource=mysqli_query($conexion,$query);   
$disponibles=mysqli_fetch_row($resource);


$query="SELECT SUM(Cantidad*-1) as disponible FROM `novedades`  INNER JOIN elemento ON novedades.id_Elemento=elemento.id_Elemento where novedades.id_Novedades=2 AND elemento.id_Elemento=$id_producto";
$resource=mysqli_query($conexion,$query);   
$salidas=mysqli_fetch_row($resource);


 ?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../include/head.php';
?>
<body>

  <?php
  include '../include/menu.php';
  ?>
  <!-- Page Content -->
        <div class="right_col" role="main">
            <div class="container-fluid xyz">
  
<div class="row">
  <div class="col-md-12">
<h1><?php echo "$entradas[0]"; ?></h1> <h2 class="help-block">Historial</h2>
  </div>
</div>

<div class="row">
  <div class="col-md-3" style="background: #FA9696; border: 1px solid black; text-align: center; display: block; margin-right: 60px;"><h2>Entradas</h2>

<h1><?php

if ($entradas==true) {
 echo "$entradas[1]";
}else{
  echo "0";
}
  ?></h1>
  </div>
  <div class="col-md-3" style="background: #FA9696; border: 1px solid black; text-align: center; display: block; margin-right: 60px;"><h2>Disponibles</h2>

<h1><?php

if ($disponibles==true) {
   if ($disponibles[0]<0) {
    echo "0";
   }else{
    echo "$disponibles[0]";
   }
}else{
  echo "0";
}

 ?></h1>
  </div>
  <div class="col-md-3" style="background: #FA9696; border: 1px solid black; text-align: center; display: block; margin-right: 60px;"><h2>Salidas</h2>
<h1><?php
if ($salidas==true) {
  echo "$salidas[0]";
}else{
  echo "0";
}
  ?></h1>

  </div>
</div>

<div class="row">
<br><br>
  <div class="col-lg-12">
    <div class="row">
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><h3><b>Cantidad</b></h3></div>
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><h3><b>Novedad</b></h3></div>
  <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7"><h3><b>Fecha</b></h3></div>
  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
</div>
    <div class="container" id="contenedor" style=" height: 400px; overflow: auto;">
 


   <?php 

$query="SELECT novedades.Cantidad, tip_novedad.Nombre_Novedad, novedades.Fecha_Novedad, novedades.id_Novedades FROM `novedades` INNER JOIN tip_novedad ON novedades.id_Tipo_Novedad=tip_novedad.Id_Tip_Novedad WHERE novedades.id_Elemento=$id_producto order by novedades.Fecha_Novedad desc";
$resource=mysqli_query($conexion,$query);   
while ($fila=mysqli_fetch_row($resource)) {

if ($fila[0]<0) {
 $fila[0]=$fila[0]*-1;
}
if($fila[0]==0){ 

  }else{

  

   ?>
<div class="row" style="border-bottom: 1px solid black; padding: 5px;">
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo "$fila[0]"; ?></div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo "$fila[1]"; ?></div>
 <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><?php echo "$fila[2]"; ?></div>
    <form action="eliminar_historial.php" method="POST">
  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><input type="hidden" name="id_historial" value="<?php echo $fila[3]; ?>">
   <input type="hidden" name="id_ventas" value="<?php echo $fila[4]; ?>">
   <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
   <button type="submit" class="btn btn-danger" title="Eliminar Registro"><i class="icon icon-bin2"></i></button></div>
</form>
</div>
 <?php 
 }
}
    ?>


    </div>
  </div>
</div>



                <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</body>
<style>
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
 

</style>
 <?php include '../include/footer.php'; ?>

</html>