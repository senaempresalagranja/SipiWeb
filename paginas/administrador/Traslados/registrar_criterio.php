<?php

include '../conexion_login/inicio_sesion.php';
include '../include/conexion.php';
$id_unidad=$_POST["id_unidad"];

  $query="INSERT INTO `pedido`(`id_Unidad`, `Estado_Pedido`, `Total_Pedido`, `Fecha_Pedido`, Id_Usuario) VALUES ($id_unidad,'Registrado',0,NOW(),$id_usuario)";
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



?>
