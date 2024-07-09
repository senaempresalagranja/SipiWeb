<!DOCTYPE html>
<html lang="en">
<?php
include '../include/head.php';
?>
<body>

  <?php
  include '../include/menu.php';
  ?><!-- /#sidebar-wrapper -->
   <!-- Page Content -->
        <div class="right_col" role="main">
            <div class="container-fluid xyz">
  

<div class="row">
  <div class="col-md-12">
    <h1>Abastecimientos</h1>
  </div>
</div>
<br>
<br>
<br>

<?php 

include "../include/conexion.php";
$query="SELECT * FROM `elemento` ";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {
     echo "<div class='row'>
  <div class='col-md-12'  style='background: red;color: white; width: 60%; border-radius: 5px;
  height: 50px; margin-top: auto; position: relative;'>
    <br>
No hay Materia Prima base de datos
    <br>
  </div>
</div>";
}else{
 ?>
 <div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><h3><b>Nombre</b></h3></div>
     <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h3><b>Cantidad</b></h3></div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h3><b>fecha</b></h3></div>
       <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
 </div>
<div id="contenedor" class="container-fluid" style="height: 400px; overflow: auto;">


<?php 
$query="SELECT novedades.id_Novedades, elemento.Nombre_Elemento, novedades.Cantidad, novedades.Fecha_Novedad FROM `novedades` INNER JOIN elemento on novedades.id_Elemento=elemento.id_Elemento WHERE `id_Tipo_Novedad`=1
 and novedades.Cantidad>0 ORDER BY Fecha_Novedad DESC";
$resource=mysqli_query($conexion,$query); 
while ($fila=mysqli_fetch_row($resource)) {
 ?> 
  
<div class="row" style="border-bottom: 1px solid black; padding: 5px;">
   <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo "$fila[1]"; ?> </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> <?php echo "$fila[2]"; ?> </div>
     <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo "$fila[3]"; ?> </div>

     <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

<form action="eliminar_reabastecimiento.php" method="POST">
  
<input type="hidden" name="id_reabastecimiento" value=" <?php echo $fila[0] ?>">
<button class="btn btn-danger" title="Eliminar Registro"><i class="icon icon-bin"></i></button>

</form>
   </div>

</div>




<?php 
}

}
 ?>

</table>
</div>




                <span id="transmark" style="display: none; width: 0px; height: 0px; width: 100%;"></span>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</body>

 <?php include '../include/footer.php'; ?>

</html>