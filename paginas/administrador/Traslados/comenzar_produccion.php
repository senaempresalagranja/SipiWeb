<!DOCTYPE html>
<html lang="en">
<?php 
include '../include/head.php';

?>
<body>
	<?php include '../include/menu.php'; 
	$Id=$_GET["Id"];


	?>
	<div class="right_col" role="main">
<?php 	$sql="SELECT producto.Nombre_Producto,empaques.Empaque, Cantidad_Empaque,unidad_medida.Unidad, unidad.Nombre_Unidad, area.Nombre_Unidad, pedido.Fecha_Pedido, pedido_producto.Cantidad,Estado FROM `pedido_producto` 
INNER JOIN pedido ON pedido_producto.id_Pedido=pedido.id_Pedido
INNER JOIN producto ON pedido_producto.id_Producto=producto.id_Producto
INNER JOIN unidad ON pedido.id_Unidad=unidad.id_Unidad
INNER JOIN area ON unidad.id_Area=area.id_Area
INNER JOIN empaques ON producto.id_Empaque=empaques.Id_Empaque
INNER JOIN unidad_medida ON producto.id_Unidad_Medida=unidad_medida.Id_Unidad
WHERE pedido_producto.id_Pedido_Producto=$Id";

							$res=mysqli_query($conexion,$sql);

							$row=mysqli_fetch_row($res);
$cantidad_produccion=$row[7];

if ($row[8]=="Proceso") {
 ?>
<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

				<h2 class="help-block"><i class="fa fa-cogs "></i> Ya Comenzó la produccion de <?php echo "$row[0] $row[1] ($row[2] $row[3]) X $row[7] Unidades" ?></h2>
			</div>
		</div>
	</div>

 <?php
}else{
 ?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

				<h4 class="help-block"><i class="fa fa-play "></i> Comenzar Produccion de <?php echo "$row[0] $row[1] ($row[2] $row[3]) X $row[7] Unidades" ?></h4>
			</div>
		</div>
			<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">

				<h5 class="help-block"><i class="fa fa-calendar"></i> Fecha: <?php echo $row[6] ?></h5>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

				<h5 class="help-block"><i class="fa fa-exclamation-circle"></i> Unidad Requerida: <?php echo "$row[4] - Area $row[5]" ?></h5>
			</div>
		</div>



		<div class="row">	

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
				<button type="button" title="Seleccionar Productos" class="btn btn-success btn-xs" onclick="mostrar_poup(), inicio()"><h1 class=" fa fa fa-check-square"></h1> Añadir Elementos</button>
			</div>

		</div>

		<div id="contenedor_ingredientes" class="row " >
			<div style="height:400px; overflow:auto;">
				<div class="" id="checks"><br>
					<div class="col-md-12 ">
						<h3>Elementos Requeridos Para Produccion</h3>
						<table class="table table-bordered " id="tabla">
							<tr>
								<td>Elemento</td>
								<td>Unidad de Medida</td>
								<td>Cantidad</td>
								<td></td>
							</tr>
							<?php  
						
							$sql="SELECT elemento.id_Elemento,elemento.Nombre_Elemento, producto_elemento.Cantidad,pedido_producto.Cantidad, elemento.id_unidad_medida FROM `pedido_producto` 
INNER JOIN pedido ON pedido_producto.id_Pedido=pedido.id_Pedido
INNER JOIN producto ON pedido_producto.id_Producto=producto.id_Producto
INNER JOIN producto_elemento ON producto.id_Producto=producto_elemento.id_Producto
INNER JOIN elemento ON producto_elemento.id_Elemento=elemento.id_Elemento
WHERE pedido_producto.id_Pedido_Producto=$Id";

							$res=mysqli_query($conexion,$sql);

							while($row=mysqli_fetch_row($res))
							{

								?>
								<tr class="table-bordered" id="row<?php echo $row[0] ?>">
									<td class="">
										<input type='checkbox' name='materia' value="<?php echo $row[0] ?>"  Id="check<?php echo $row[0] ?>"   checked='true'> <?php echo " $row[1]" ?> 


									</td>
									<td>
										<select name='' onchange='validar_unidad_medida(<?php echo $row[0] ?>)' class='form-control' id='Selec<?php echo $row[0] ?>'><option value='Selecciona'>Selecciona Unidad de Medida</option>
										<?php 
             $sql1="SELECT * FROM `unidad_medida` order by Unidad";

             $res1=mysqli_query($conexion,$sql1);

             while($row1=mysqli_fetch_row($res1))
             {
              ?>
              <option value="<?php echo $row1[0] ?>" ><?php echo $row1[2] ?>(<?php echo $row1[1] ?>)</option>
              <?php
            }
            $cantidad_preparar=$row[2]*$row[3];
?>
            </select>
									</td>
									<td>
									<input style='display: block; ' type='number' id="<?php echo $row[0] ?>" placeholder='Cantidad de Producto' class='form-control' value="<?php echo $cantidad_preparar ?>" onkeyup='validar_cantidad(<?php echo $row[0] ?>)'>	
									</td>
<td><button class='btn btn-danger ' title='Retirar Producto' onclick='eliminar_row(<?php echo $row[0] ?>)'><h6 class='icon icon-bin'></h6></button></td>
								</tr>  
								<?php 
								echo "<script>
var Select$row[4]=document.getElementById('Selec$row[0]').value='$row[4]';
								</script>";

							}

							?>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"><button  type="button" title="Comenzar Produccion" class="btn btn-success btn-lg fa fa-cogs" onclick="registrar(<?php echo $Id ?>,<?php echo $cantidad_produccion ?>)"><i class="fa fa-exclamation-circle"></i></button></div>
		</div>
		<div id="contenedor"></div>

	</body>



	<div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h1 class="modal-title">SELECCIONA ELEMENTOS</h1>

				</div>
				<div class="modal-body">

					<div class="container" id="contenedor_elementos">


					</div>

				</div>
				<div class="modal-footer">

					<a href="#" data-dismiss="modal" class="btn btn-danger fa fa-remove"> Cerrar</a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
	 include '../include/footer.php'; ?>

	<script type="text/javascript">

		function registrar_ingredientes(id_producto) {
			var id_producto=id_producto;
			var checactivado=$("#contenedor_ingredientes :checkbox");
			var contador_ingrediente=0;

			for (var i = checactivado.length - 1; i >= 0; i--) {
				if (checactivado[i].checked==true) {

					var total_veces= checactivado.length;
					contador_ingrediente=contador_ingrediente+1;



					var ingrediente=checactivado[i].value;
					var cantidad=document.getElementById(checactivado[i].value).value;
					var unidad_medida=document.getElementById("Selec" + checactivado[i].value).value;





					$("#contenedor").load("registrar_elementos_lote.php",{id_producto:id_producto,ingrediente:ingrediente,cantidad:cantidad,unidad_medida:unidad_medida});

				}

			}


			nuevo_registro();
setTimeout('teletransportacion()',(1000*2));

		}

function teletransportacion() {
  window.location = 'pedidos.php';
	
}
		function nuevo_registro() {
			var checactivado=$("#contenedor_ingredientes :checkbox");

			for (var i =0;  i <=checactivado.length-1;i++) {
				eliminar_row(checactivado[i].value);
			}

		}

		function registrar(id_Pedido_Producto,cantidad) {
	
 swal({
          title: 'Advertencia',
          text: "Desea Enviar estos elementos a produccion? Debe de tener encuenta que no podra editar ni eliminar nada durante ella (Solo El Administrador podra Realizarlo)",
          type:"warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Enviar Nota de Produccion',
          cancelButtonText: 'No, Esperar y confirmar',
          buttonsStyling: true
        }).then(function() {
        // si
      
	var contador_actiados=0;
			var validados=0;
			var activados=0;
			var unidad_sec=0;
			var checactivado=$("#contenedor_ingredientes :checkbox");

			for (var i =0;  i <=checactivado.length-1;i++) {
				if (checactivado[i].checked==true) {
					contador_actiados=contador_actiados+1;
					activados=activados+1

					if (validar_cantidad(checactivado[i].value)) {
						validados=validados+1;
					}

					if (validar_unidad_medida(checactivado[i].value)==true) {
						unidad_sec=unidad_sec+1;
					}


				}

			}

			if (activados==0) {
				swal('Error','Selecciona Un Producto','error')

			}else{

				if (unidad_sec==activados) {

					if (contador_actiados==validados) {

					
						$("#contenedor").load("registrar_lote_produccion.php",{id_Pedido_Producto:id_Pedido_Producto,cantidad:cantidad});

						swal({
							title: 'Registrando Pedido',
							html: 'Espere....',
							timer: 6000,
							customClass: 'animated tada',
							imageUrl: '../../../images/enviando_pedido.gif',
							imageWidth: 600,
							imageHeight: 400,
							imageAlt: 'Custom image',
							animation: true,
							onOpen: () => {
								swal.showLoading()
								timerInterval = setInterval(() => {
									swal.getContent().querySelector('strong')
									.textContent = swal.getTimerLeft()
								}, 100)
							},
							onClose: () => {
								clearInterval(timerInterval)
							}
						}).then((result) => {
							if (
    // Read more about handling dismissals
    result.dismiss === swal.DismissReason.timer
    ) {

							}
					})
					}else{

						swal('Error', 'Ha seleccionado Un Elemento y no ha puesto la cantidad','error');
					}
				}else{

					swal('Error', 'Seleccione Unidad de Medida','error');
				}

			}


        }, function(dismiss) {
          // dismiss can be 'cancel', 'overlay', 'close', 'timer'
          if (dismiss === 'cancel') { 
// NO
        }
      })
		}




		$(document).ready(inicio);
		function inicio() {

			
			$("#contenedor_elementos").load("cargar_elementos.php")



		}




		function eliminar_row(id) {
			document.getElementById("row" + id).innerHTML="";
			document.getElementById("row" + id).id="diferente";

		}




		function mostrar_poup() {

			$("#productos").modal("show");
		}
		function validar_id_area() {
			var id_area=document.getElementById('id_area').value;
			if (id_area=="Selecciona") {
				var id_area=document.getElementById('id_area').style.border="2px solid red";

				return false;
			}else{
				var id_area=document.getElementById('id_area').style.border="2px solid green";
				return true;
			}
		}
		function cargar_selec_unidad(id) {


			$("#Selec" + id).load("cargar_unidades_medida_elementos.php");
		}

		function validar_unidad_medida(id) {
			var id_area=document.getElementById("Selec" +id).value;
			if (id_area=="Selecciona") {
				var id_area=document.getElementById("Selec" +id).style.border="2px solid red";

				return false;
			}else{
				var id_area=document.getElementById("Selec" +id).style.border="2px solid green";
				return true;
			}
		}

		function chekear_auto(id) {

			if (document.getElementById("row" + id)) {

				var chekacti=document.getElementById("check_poup" + id).checked='true';

			}else{

			}


		}



		function agregar_check(id,nombre) {
			var chekacti=document.getElementById("check_poup" + id);
			if (chekacti.checked==true) {
				if (document.getElementById("row" + id)) {

				}else{
					var table = document.getElementById('tabla');
					{
						var row = table.insertRow(1);
						row.id="row" + id;
						var cell1 = row.insertCell(0);
						var cell2 = row.insertCell(1);
						var cell3 = row.insertCell(2);
						var cell4 = row.insertCell(3);

						cell1.innerHTML = "<input type='checkbox' name='materia' value=" + id +"  Id="+"check" + id +"   checked='true'> " + nombre;
						cell2.innerHTML = " <select name='' onchange='validar_unidad_medida(" + id +")' class='form-control' id='Selec" + id +"'><option value='Selecciona'>Selecciona Unidad de Medida</option></select>";
						cell3.innerHTML =" <input style='display: block; ' type='number' id=" + id +" placeholder='Cantidad de Producto' class='form-control' onkeyup='validar_cantidad(" + id +")'>";
						cell4.innerHTML ="<button class='btn btn-danger ' title='Retirar Producto' onclick='eliminar_row(" + id+")'><h6 class='icon icon-bin'></h6></button>";


					}


					cargar_selec_unidad(id);
				}
			}else{

				eliminar_row(id)
			}
		}


		function validar_cantidad(id) {

			var cantidad_ingrediente=parseInt(document.getElementById(id).value);
			if(cantidad_ingrediente==null  || cantidad_ingrediente.length==0 || /^\s+$/.test(cantidad_ingrediente) || cantidad_ingrediente<0){
				var cantidad_ingrediente=document.getElementById(id).style.border="2px solid red";
				return false;
			} else if (isNaN(cantidad_ingrediente)) {
				var cantidad_ingrediente=document.getElementById(id).style.border="2px solid red";
				return false;
			}else{
				var cantidad_ingrediente=document.getElementById(id).style.border="2px solid green";
				return true;
			}
		}
	</script>
	</html>