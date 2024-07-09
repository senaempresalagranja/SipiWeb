<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../../imprmir_tikects/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
	$connector = new WindowsPrintConnector("php");
	$printer = new Printer($connector);
	include '../include/conexion.php';
$query="SELECT now() FROM `acompanantes`
 ";
$resource=mysqli_query($conexion,$query);
$productos_stock=mysqli_fetch_row($resource);
$fecha=$productos_stock[0];

	/* Height and width */
	$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
	$printer->text("Productos \n");
	$printer->text("Inventario \n");
	$printer->selectPrintMode();
	$printer->text($fecha . "\n");
	$printer->text("----------------------------\n");

$query1="SELECT * FROM `categoria_materia`";
	$resource1=mysqli_query($conexion,$query1);
	while ($productos_stock1=mysqli_fetch_row($resource1)) {
$printer->selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
	$printer->text($productos_stock1[1] ." \n");

	$printer->selectPrintMode();

	$query="SELECT materia_prima.Codigo_Materia, materia_prima.Nombre,SUM(Cantidad) as existencia,
	materia_prima.Stock FROM `novedades`
	INNER JOIN materia_prima ON novedades.Id_Materia_Prima=materia_prima.Id_Materia_Prima where Id_Categoria_Materia=$productos_stock1[0] GROUP BY materia_prima.Id_Materia_Prima order by materia_prima.Codigo_Materia";
	$resource=mysqli_query($conexion,$query);
	while ($productos_stock=mysqli_fetch_row($resource)) {
		if ($productos_stock==true) {
  # code...

			if ($productos_stock[2]==0 ) {
// echo "$productos_stock[1]----Sin Existencias \n";
				$printer->text($productos_stock[1]. "----Sin Existencias \n");



			}else{
// echo "$productos_stock[1]---- $productos_stock[2] \n";
	$printer->text($productos_stock[1]. "----  " . $productos_stock[2]." \n");

}

}

}
}

$printer->cut();
$printer->close();
} catch (Exception $e) {
	echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
