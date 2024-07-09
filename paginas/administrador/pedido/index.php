<!DOCTYPE html>
<html lang="en">
<?php 
include '../include/head.php';

?>
<body>
	<?php include '../include/menu.php';  ?>
	<div class="right_col" role="main">

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

				<h1 class="help-block"><i class="fa fa-phone "></i> Nuevo Pedido <i class="icon-plus"></i></h1>
			</div>
		</div>



		<div class="row">	

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
				<button type="button" title="Seleccionar Productos" class="btn btn-success" onclick="mostrar_poup(),traer_producto()"><h1 class=" fa fa fa-check-square"></h1> Seleccione Productos</button>
			</div>

		</div>

		<div id="contenedor_ingredientes" class="row " >
			<div style="height:400px; overflow:auto;">
				<div class="" id="checks"><br>
					<div class="col-md-12 ">
						<table class="table table-bordered " id="tabla">
							<tr>
								<td>Producto</td>
								<td>Unidad de Medida</td>
								<td>Cantidad</td>
								<td></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"><button  type="button" title="Registrar Pedido" class="btn btn-success btn-lg fa fa-shopping-cart" onclick="registrar()"></button></div>
		</div>
<div id="contenedor"></div>

	</body>



	<div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h1 class="modal-title">SELECCIONA PRODUCTOS</h1>

				</div>
				<div class="modal-body">

					<div class="container">
						<div class="row" id="area_seleccion">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">

								<select name="" id="id_area" title="Area" class="form-control has-feedback-left" onchange="validar_id_area(), cargar_unidades()">
									<option class="btn" value="Selecciona">Selecciona Area</option>

									<?php 
									$sql="SELECT * FROM `area` ";

									$res=mysqli_query($conexion,$sql);

									while($row=mysqli_fetch_row($res))
									{
										?>
										<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
										<?php
									}
									?>
								</select>
								<span class="icon icon-location form-control-feedback left" aria-hidden="true"></span>
							</div>


							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">

								<select name="" id="id_unidad" title="Unidad" class="form-control has-feedback-left" onchange="validar_id_unidad()">
									<option class="btn" value="Selecciona">Selecciona Unidad</option>

								</select>
								<span class="icon icon-eyedropper form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">

								
								<input type="button" value="Traer Productos" id="btn_cargar" class="btn btn-primary form-control " onclick="traer_producto()">
								
									
							</div>
						</div>
						<h4 id="leyenda" class="help-block" style="color:red; display: none">Se desactiva esta zona para evitar selccionar productos de diferentes unidades (un pedido solo puede llevar productos de una unidad en especifico)</h4>

						<div class="col-md-12 ">
							<hr>
							<h2 class="help-block"><i class="icon icon-barcode"></i> Seleccione lo Productos necesarios</h2>
							<div class="col-md-3"><input type="text" placeholder="Filtro" class="form-control" id="criterio"></div>
							<table class="table table-bordered table-condensed" id="contenedor_registros">


							</table>
						</div>


					</div>


				</div>
				<div class="modal-footer">

					<a href="#" data-dismiss="modal" class="btn btn-danger fa fa-remove"> Cerrar</a>
				</div>
			</div>
		</div>
	</div>
	<?php include '../include/footer.php'; ?>

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





      $("#contenedor").load("registrar_ingredientes.php",{id_producto:id_producto,ingrediente:ingrediente,cantidad:cantidad,unidad_medida:unidad_medida});
   
    }

  }

  nuevo_registro()


}

function nuevo_registro() {
	swal('exito','El pedido ha sido registrado','success')
				var checactivado=$("#contenedor_ingredientes :checkbox");

			for (var i =0;  i <=checactivado.length-1;i++) {
			eliminar_row(checactivado[i].value);
					}

}

		function registrar() {
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

						var id_unidad=document.getElementById("id_unidad").value;
						$("#contenedor").load("registrar_criterio.php",{id_unidad:id_unidad});

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

						swal('Error', 'Ha seleccionado Un Producto y no ha puesto la cantidad','error');
					}
				}else{

						swal('Error', 'Seleccione Unidad de Medida','error');
				}

			}

		}




		$(document).ready(inicio);
		function inicio() {

			$("#criterio").keyup(consulta_automatica)
			var criterio=document.getElementById('criterio').style.display="none";




	

		}


		function traer_producto() {

			if (validar_id_area()==true && validar_id_unidad()==true) {
				var criterio=document.getElementById('criterio').style.display="block";
			var id_unidad=document.getElementById("id_unidad").value;
			var criterio=document.getElementById('criterio').value;
			$("#contenedor_registros").load("traer_productos.php",{id_unidad:id_unidad,criterio:criterio});
			var id_unidad=document.getElementById("id_unidad").disabled="true";
			var id_area=document.getElementById("id_area").disabled="true";
			var btn_cargar=document.getElementById("btn_cargar").disabled="true";
			var leyenda=document.getElementById("leyenda").style.display="block";
 // var leyenda=document.getElementById("leyenda").disabled="true";	
			}
		

}	

function eliminar_row(id) {
	document.getElementById("row" + id).innerHTML="";
	document.getElementById("row" + id).id="diferente";
}


function consulta_automatica() {
	var criterio=document.getElementById('criterio').value;
	if(/[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(criterio)){
		var criterio=document.getElementById('criterio').style.border="2px solid red";
	}else{

		var id_unidad=document.getElementById("id_unidad").value;
		var criterio=document.getElementById('criterio').value;
		$("#contenedor_registros").load("traer_productos.php",{id_unidad:id_unidad,criterio:criterio});
		var criterio=document.getElementById('criterio').style.border="2px solid green";
	}
}

function cargar_unidades() {
	var id_area=document.getElementById("id_area").value;

	$("#id_unidad").load("cargar_unidades.php",{id_area:id_area});

}

function cargar_selec_unidad(id) {


	$("#Selec" + id).load("cargar_unidades_medida.php",{id:id});
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

	}


}

function validar_id_unidad() {
	var id_unidad=document.getElementById('id_unidad').value;
	if (id_unidad=="Selecciona") {
		var id_unidad=document.getElementById('id_unidad').style.border="2px solid red";

		return false;
	}else{
		var id_unidad=document.getElementById('id_unidad').style.border="2px solid green";


		return true;
	}
}


function cambiar_btn(nombre) {
	var btn_cargar=document.getElementById("btn_cargar").value="Productos unidad de " + nombre;
}

function agregar_check(id,nombre,Unidad,empaque, cantidad_empaque) {
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

				cell1.innerHTML = "<input type='checkbox' name='materia' value=" + id +"  Id="+"check" + id +"   checked='true'> " + nombre + " " + Unidad +" " + empaque +" " +cantidad_empaque;
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