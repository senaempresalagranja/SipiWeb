<?php 

require_once('../../../exportar/tcpdf.php');


// P ORIENTACION VERTICA
// L ORIENTACION HORIZONTAL

$pdf = new TCPDF("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SIPIWEB');
$pdf->SetTitle('SIPIWEB');
$pdf->SetSubject('SENA');
$pdf->SetKeywords('EXPORTAR DATOS BD');

// $pdf->SetPrintHeader(false); AQUI ES PARA QUE NO IMPRIMAR CABECERA
// $pdf->SetPrintFooter(false); AQUI ES PARA QUE NO SE IMPRIMA EL PIE DE PAGINA OSEA EL NUMERO DE LA PAGINA


// AQUI ES PARA LAS MARGENES EN LA HOJA PONGO 20 PORQUE SON MILIMETROS LO QUE PUSIMOS ARRIBA mm LAS MEDIDAS QUE VASMOS A UTILIZAR 
$pdf->SetMargins(20,20,20, false); 


// ------IMPORTANTE AQUI ABAJO NO TOCAR: AQUI ABAJO ES SI EN ALGUN CASO LLEGO A ESCRIBIR MUCHO CODIGO HTML Y SOBRE PASA LA HOJA SIMPLEMENTE ME PONGA OTRA HOJA COMO EN WORD VOY ESCRIBIENDO Y ME SACA OTRA HOJA SI AQUI ABAJO PONGO false NO ME VA SA LIR OTRA HOJA SI NO QUE EL CONTENIDO DE QUE SOBREPASE LA HOJA SE VA A PERDER
$pdf->SetAutoPageBreak(true, 20);

// NO TOCA AQUI ARRIBA ^^^^^^


// HEADER LOGO ES PARA PONER EL LOGO PARA CAMBIARLO TOCA A IR A AUTO CONFIGURADO Y CAMBIAR ESO POR DEFECTO CAMBIAR LA CARPTEA Y CAMBIAR LA IMAGEN
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', '');


$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}


$pdf->SetFont('helvetica', '', 9);

// PONEMOS UNA PAGINA SI PONGO OTRO AddPage PONGO OTRA PAGINA ES DECIR SON PAGINAS
$pdf->AddPage();





// CONTENIDO DE HTML



// AQUI ABAJO LE ESTOY ANEXANDO UN foreach ES UN CICLO EN POCAS PALABRAS WHILE PERO EN PHP ES foreach PARA PONER NUMERO DE LOTES QUE HAY EN LA BASE D EDATOS ES DECIR QUE SEHA DINAMICO SI SE ACTUALIZA ME GENERA MAS
$servidor = "localhost"; //el servidor que utilizaremos, en este caso será el localhost
$usuario = "root"; //El usuario que tiene mysql por defecto
$contrasenha = ""; //La contraseña del usuario que utilizaremos
$BD = "sipiweb"; //El nombre de la base de datos


/*Aquí abrimos la conexión en el servidor.
Normalmente se envian 3 parametros (los datos del servidor, usuario y contraseña) a la función mysql_connect,
si no hay ningún error la conexión será un éxito
El @ que se ponde delante de la funcion, es para que no muestre el error al momento de ejecutarse, ya crearemos un código para eso*/
$conexion = mysqli_connect($servidor, $usuario, $contrasenha,$BD);
$mysqli=new mysqli("localhost", "root", "", "sipiweb");
$id=$_POST["id"];
$sql="SELECT `id_Pedido`, unidad.Nombre_Unidad, `Estado_Pedido`,`Fecha_Pedido`, usuarios.Nombre_Usuario FROM `pedido` 
INNER JOIN usuarios ON pedido.Id_Usuario=usuarios.Id_usuario
INNER JOIN unidad ON pedido.id_Unidad=unidad.id_Unidad where id_Pedido=$id";

$res=mysqli_query($conexion,$sql);

$row1=mysqli_fetch_row($res);
$sql="SELECT id_Pedido_Producto, `Nombre_Producto`, empaques.Empaque, Cantidad,unidad_medida.Unidad,Cantidad_Empaque FROM pedido_producto
INNER JOIN producto ON pedido_producto.id_Producto=producto.id_Producto
INNER JOIN empaques ON producto.id_Empaque=empaques.Id_Empaque
INNER JOIN unidad_medida ON producto.id_Unidad_Medida=unidad_medida.id_unidad
where `id_Pedido`=$id";
$lotes= $mysqli->query($sql);
$row=$lotes;


$html='
<style>
h2{

	position: relative;
	display: block; 
	color: red;
	font-family: arial;
	font-size: 20pt;
	text-align: center;
}
table,td{

	border:0px solid black;
	border-collapse:collapse;
}
 .area{
background-color: #EDE5E3;

	 }
	 .rojiso{
	 	background-color:dd5f5f;
	 }
</style>
<h2>Resumen Pedido Unidad '.$row1[1].' '.$row1[3].'</h2>
<table >
<tr class="area">
<td><b>Fecha</b></td>
<td><b>Estado</b></td>
<td><b>Responsable de Registro</b></td>
<td><b>Unidad Requerida</b></td>
</tr>
<tr>
<td>'.$row1[3].'</td>
<td>'.$row1[2].'</td>
<td>'.$row1[4].'</td>
<td>'.$row1[1].'</td></tr>


</table>
<p></p>

	<table>
	<tr class="area">
	<td colspan="2" style="text-align:center"><h3>Productos</h3></td>
	</tr>
	<tr class="area">
	<td><b>Nombre Producto (caracteristicas) </b></td>
	<td><b>Cantidad Pedido</b></td>
	

	</tr>           
	</table>  
';
$item=0;
foreach ($lotes as $row) {
	$Nombre_Producto=$row["Nombre_Producto"];
	$Empaque=$row["Empaque"];
	$Unidad=$row["Unidad"];
	$Cantidad_Empaque=$row["Cantidad_Empaque"];
	$cantidad=$row["Cantidad"];




	$html .='
	<style>

	table,td{

		border:0px solid black;
		border-collapse:collapse;
	}
</style>
	<table>
	<tr>
	<td>'.$Nombre_Producto. ' ' .$Empaque. ' ' . '(' . $Unidad . ' ' .$Cantidad_Empaque .')</td>
	<td>'.$cantidad.'</td>
	

	</tr>           
	</table>  

	</style>

   ';


	
}


	$pdf->writeHTML($html, true, 0,true,0);

	$pdf->lastPage();

// ---------------------------------------------------------

// NOMBRE DEL ARCHIVO
	$pdf->Output('Resumen_Pedido.pdf', 'D');


// AQUI EN I ( I ES PARA VISUALIZACION EN LINEA PARA QUE SE ABRA EL PDF EN EL NACEGADOR Y "D" DESCARGA AUTOMATICA ) 




	?>