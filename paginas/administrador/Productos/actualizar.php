<?php

include '../include/conexion.php';
$Nombre_Elemento=$_POST["Nombre_Elemento"];
$id_unidad_medida=$_POST["id_unidad_medida"];
$Precio_Elemento=$_POST["Precio_Elemento"];
$Tipo_Elemento=$_POST["Tipo_Elemento"];
$Stock=$_POST["Stock"];

$id_criterio=$_POST["id_criterio"];


$query="SELECT * FROM `elemento` WHERE `Nombre_Elemento`='$Nombre_Elemento' and `Tipo_Materia_Prima`='$Tipo_Elemento' and id_Elemento!=$id_criterio";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

  <script type="text/javascript">
  swal("Error", "Elemento Ya Existe","error");
</script>
<?php
}else {

  $query="UPDATE `elemento` SET `Nombre_Elemento`='$Nombre_Elemento',`id_unidad_medida`='$id_unidad_medida',`valor_Elemento`='$Precio_Elemento',`Tipo_Materia_Prima`='$Tipo_Elemento',`stock`='$Stock' WHERE `id_Elemento`=$id_criterio";
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
