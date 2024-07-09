<?php

include '../include/conexion.php';
$criterio=$_POST["criterio"];


$query="SELECT `Id_Empaque`, `Empaque` FROM `empaques`  WHERE Empaque='$criterio' ";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

  <script type="text/javascript">
  swal("Error", "Nombre de Empaque Ya Existente","error");
</script>
<?php
}else {

  $query="INSERT INTO `empaques`(`Empaque`) VALUES ('$criterio')";
  $resource=mysqli_query($conexion,$query);

  if ($resource==true) {
?>
<script type="text/javascript">
swal('Exito','Registro Exitoso','success')
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
