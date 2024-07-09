<?php

include '../include/conexion.php';
$Nombre_Elemento=$_POST["Nombre_Elemento"];
$Nombre_Elemento_Co=$_POST["Nombre_Elemento_Co"];
$id_unidad_medida=$_POST["id_unidad_medida"];
$Precio_Elemento=$_POST["Precio_Elemento"];
$Tipo_Elemento=$_POST["Tipo_Elemento"];
$Stock=$_POST["Stock"];
$Id_presentacion=$_POST["Id_presentacion"];

$query="SELECT * FROM `elemento` WHERE `Nombre_Elemento`='$Nombre_Elemento' and `Tipo_Materia_Prima`='$Tipo_Elemento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

<h4 class="label label-danger">Elemento Ya Existe</h4>
<?php
}else {

  $query="INSERT INTO `elemento`(`id_Elemento`, `Nombre_Elemento`, `id_unidad_medida`, `valor_Elemento`, `Tipo_Materia_Prima`,  `stock`,Nombre_Comercial, Id_Empaque) VALUES (null,'$Nombre_Elemento',$id_unidad_medida,$Precio_Elemento,'$Tipo_Elemento',$Stock,'$Nombre_Elemento_Co', '$Id_presentacion')";
  $resource=mysqli_query($conexion,$query);

$id_Elemento=mysqli_insert_id($conexion);
    $query="INSERT INTO `novedades`( `id_Elemento`, `id_Tipo_Novedad`, `Fecha_Novedad`, `Cantidad`) VALUES ($id_Elemento,1,now(),0)";
  $resource=mysqli_query($conexion,$query);

  if ($resource==true) {
?>

<script type="text/javascript">
swal('Registro Insertado','','success')

      var Nombre_Elemento=document.getElementById('Nombre_Elemento').value='';
      var id_unidad_medida=document.getElementById('id_unidad_medida').value='Selecciona';
      var Precio_Elemento=document.getElementById('Precio_Elemento').value='';
     
      var Stock=document.getElementById('Stock').value='';
var Nombre_Elemento=document.getElementById('Nombre_Elemento').focus();
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
