<?php 

include '../include/conexion.php';
$id_reabastecimiento=$_POST["id_reabastecimiento"];

$query="DELETE FROM `novedades` WHERE id_Novedades=$id_reabastecimiento";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	header ("Location: reabastecimientos.php");

}else{
echo "error al Eliminar";
}
 ?>
