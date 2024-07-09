<?php

include '../include/conexion.php';
$criterio=$_POST["criterio"];
$id_criterio=$_POST["id_criterio"];
$Codigo=$_POST["Codigo"];

$query="SELECT * FROM `Unidad_medida` WHERE `Codigo`=$Codigo AND  Id_Unidad!='$id_criterio' ";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

  <script type="text/javascript">
  swal("Error", "Unidad de Medida Ya Existente","error");
</script>
<?php
}else {

  $query="UPDATE `Unidad_medida` SET `Unidad`='$criterio',  Codigo=$Codigo WHERE `Id_Unidad`=$id_criterio";
  $resource=mysqli_query($conexion,$query);

  if ($resource==true) {
?>
<script type="text/javascript">
  window.location = 'index.php';
</script>
<?php
}else{

  ?>
  <script type="text/javascript">
  swal("Error", "Registro No Insertado","error");
</script>
  <?php
}
}


?>
