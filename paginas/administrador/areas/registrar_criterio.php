<?php

include '../include/conexion.php';
$criterio=$_POST["criterio"];

$query="SELECT * FROM `area` WHERE `Nombre_Unidad`='$criterio' ";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

  <script type="text/javascript">
  swal("Error", "Area ya existe","error");
</script>
<?php
}else {

  $query="INSERT INTO `area`(`Nombre_Unidad`) VALUES ('$criterio')";
  $resource=mysqli_query($conexion,$query);

  if ($resource==true) {
?>
<script type="text/javascript">
  swal("Bien","Registro Exitoso", "success")
var criterio=document.getElementById('criterio').value="";
var criterio=document.getElementById('criterio').focus();
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
