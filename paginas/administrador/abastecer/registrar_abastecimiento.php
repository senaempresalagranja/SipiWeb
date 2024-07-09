<?php 

include '../include/conexion.php';

$id=$_POST["id"];
$cantidad=$_POST["cantidad"];
$id_unidad_medida=$_POST["id_unidad_medida"];
$costo=$_POST["costo"];



$query="INSERT INTO `novedades`(`id_Elemento`, `Cantidad`,`id_Tipo_Novedad`, `Fecha_Novedad`,Id_Unidad,Valor_Novedad)
 VALUES ('$id','$cantidad','1',NOW(),$id_unidad_medida,$costo)";
$resource=mysqli_query($conexion,$query);



if ($resource==true ) {

echo "
  <td  style='background: #06a2c1; color: white; margin: auto;' colspan='6'>
    <p class='fa fa-paper-plane'> Abastecimiento Realizado</p>
  </td>
";
}else{
	echo "<div class=''>
  <div class='col-md-12 text-center' style='background: #red; color: white; margin: auto;'>
    <p>Abastecimiento No Realizado</p>
  </div>
</div>";
}

 ?>