<?php

include '../include/conexion.php';
$criterio=$_POST["criterio"];
$id_criterio=$_POST["id_criterio"];


$query="SELECT `Id_Empaque`, `Empaque` FROM `empaques` WHERE Empaque='$criterio' AND  Id_Empaque!='$id_criterio'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

  <script type="text/javascript">
  swal("Error", "Nombre de Empaque Ya Existente","error");
</script>
<?php
}else {

  $query="UPDATE `empaques` SET `Empaque`='$criterio' WHERE Id_Empaque='$id_criterio'";
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
