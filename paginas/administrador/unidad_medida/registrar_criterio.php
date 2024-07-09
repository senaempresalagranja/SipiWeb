<?php

include '../include/conexion.php';
$criterio=$_POST["criterio"];
$Codigo=$_POST["Codigo"];

$query="SELECT * FROM `Unidad_medida` WHERE `Unidad`='$criterio' and Codigo='$Codigo'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

  <script type="text/javascript">
  swal("Error", "Unidad de medida ya existe","error");
</script>
<?php
}else {

  $query="INSERT INTO `Unidad_medida`(Codigo ,`Unidad`) VALUES ($Codigo, '$criterio')";
  $resource=mysqli_query($conexion,$query);

  if ($resource==true) {
?>
<script type="text/javascript">
  swal("Bien","Registro Exitoso", "success")
var criterio=document.getElementById('criterio').value="";
var criterio=document.getElementById('Codigo').value="";
var criterio=document.getElementById('Codigo').focus();
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
