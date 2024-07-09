<?php

include '../include/conexion.php';
$criterio=$_POST["criterio"];
$Area=$_POST["Area"];

$query="SELECT * FROM `unidad` WHERE `Nombre_Unidad`='$criterio' and id_Area=$Area ";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

  <script type="text/javascript">
  swal("Error", "Unidad ya existe","error");
</script>
<?php
}else {

  $query="INSERT INTO `unidad`( `Nombre_Unidad`, `id_Area`) VALUES ('$criterio','$Area')";
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
