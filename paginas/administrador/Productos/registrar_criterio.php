<?php

include '../include/conexion.php';
$Nombre_Producto=$_POST["Nombre_Producto"];
$id_empaque=$_POST["id_empaque"];
$precio_producto=$_POST["precio_producto"];
$id_unidad_medida=$_POST["id_unidad_medida"];
$Stock=$_POST["Stock"];
$Id_Unidad=$_POST["Id_Unidad"];
$Cantidad_empaque=$_POST["Cantidad_empaque"];

$query="SELECT * FROM `producto` WHERE `Nombre_Producto`='$Nombre_Producto' and `id_Unidad_Medida`='$id_unidad_medida'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
  ?>

<h4 class="label label-danger">Producto Ya Existe</h4>
<?php
}else {

  $query="INSERT INTO `producto`(`id_Producto`, `Nombre_Producto`, `id_Empaque`, `Precio_venta`, `id_Unidad_Medida`,id_Unidad,Cantidad_Empaque) VALUES (null,'$Nombre_Producto','$id_empaque','$precio_producto','$id_unidad_medida','$Id_Unidad',$Cantidad_empaque)";
  $resource=mysqli_query($conexion,$query);
  $id_producto=mysqli_insert_id($conexion);

  if ($resource==true) {
  echo "<script>
    registrar_ingredientes('$id_producto');

    </script>";


}else{

  ?>
  <script type="text/javascript">
  swal("Error", "Registro No Insertado","error");
</script>
  <?php
}
}


?>
