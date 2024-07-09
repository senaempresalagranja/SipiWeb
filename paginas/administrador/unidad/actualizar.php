<?php

include '../include/conexion.php';
$criterio=$_POST["criterio"];
$id_criterio=$_POST["id_criterio"];
$Area=$_POST["Area"];

$query="SELECT * FROM `unidad` WHERE Nombre_Unidad ='$criterio'  AND  id_Unidad!='$id_criterio' ";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

  <script type="text/javascript">
  swal("Error", "Unidad Ya Existente","error");
</script>
<?php
}else {

  $query="UPDATE `unidad` SET `Nombre_Unidad`='$criterio',`id_Area`=$Area WHERE `id_Unidad`=$id_criterio";
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
