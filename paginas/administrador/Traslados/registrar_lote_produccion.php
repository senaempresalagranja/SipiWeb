<?php

include '../conexion_login/inicio_sesion.php';
include '../include/conexion.php';
$id_Pedido_Producto=$_POST["id_Pedido_Producto"];
$cantidad=$_POST["cantidad"];
  $query="INSERT INTO `loteproduccion`( `id_Pedido_Producto`, `Fecha_Produccion`, `Cantidad`, `Estado`, `id_Usuario`) VALUES ($id_Pedido_Producto,NOW(),$cantidad,'Proceso',$id_usuario)";

  $resource=mysqli_query($conexion,$query);
  $id_producto=mysqli_insert_id($conexion);
    $query="SELECT `id_Pedido` FROM `pedido_producto` WHERE `id_Pedido_Producto`=$id_Pedido_Producto";

  $resource=mysqli_query($conexion,$query);
  $fila=mysqli_fetch_row($resource);
  $id_pedido=$fila[0];

   $query="UPDATE `pedido` SET `Estado_Pedido`='Proceso' WHERE `id_Pedido`=$id_pedido";

  $resource=mysqli_query($conexion,$query);
  $query="UPDATE `pedido_producto` SET`Estado`='Proceso' WHERE `id_Pedido_Producto`=$id_Pedido_Producto";

  $resource=mysqli_query($conexion,$query);
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



?>
