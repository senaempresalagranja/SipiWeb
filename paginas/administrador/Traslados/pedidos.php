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
				<h1 class="help-block"><i class="icon icon-calendar"></i> Pedidos</h1>
				<hr>
			</div>
		</div>
<div class="row">
	<div class="col-md-12"><h3>Lista de pedidos a Trasladar <li class="fa fa-list-ul"></li></h3></div>
	<hr>
</div>
<div class="row table-responsive" style="height: 400px; overflow: auto;">
<table class="table table-striped jambo_table bulk_action table-bordered" id="Contenedor_pedidos" >
	
</table>	

</div>


	</div>
<div id="contenedor"></div>

	</body>



	<div class="modal fade" id="productos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h1 class="modal-title">RESUMEN DE PEDIDO <i class="fa fa-eye"></i></h1>

				</div>
				<div class="modal-body">
					<div class="container" id="contenedor_resumen">
			

					</div>


				</div>
				<div class="modal-footer">

						<a href="#" data-dismiss="modal" class="btn btn-danger fa fa-remove btn-xs"> Cerrar</a>
				</div>
			</div>
		</div>
	</div>

		<div class="modal fade" id="registrar_producto_pedido" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h1 class="modal-title">REGISTRAR PRODUCTO<i class="icon icon-barcode"></i></h1>

				</div>
				<div class="modal-body">
<div class="container">

		<div class="row">
		<div class="col-md-12">
					<table id="contenedor_registrar_productos" class="table table-bordered table-condensed table-hover">
	
</table>
		</div>
		</div>


</div>
				</div>
				<div class="modal-footer">

					<a href="#" data-dismiss="modal" class="btn btn-danger fa fa-remove btn-xs"> Cerrar</a>
				</div>
			</div>
		</div>
	</div>

	<?php include '../include/footer.php'; ?>

	<script type="text/javascript">

$(document).ready(inicio);

function trasladar_producto(id_producto_pedido) {
	     swal({
          title: 'Advertencia',
          text: "Esta a punto de Realizar un traslado del producto, esta accion no se puede deshacer. ¿Esta Seguro?",
				type:'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Trasladar',
          cancelButtonText: 'No, Cancelar',
          buttonsStyling: true
        }).then(function() {
        // si
   $("#contenedor").load("registrar_traslado.php",{id_producto_pedido:id_producto_pedido})

        }, function(dismiss) {
          // dismiss can be 'cancel', 'overlay', 'close', 'timer'
          if (dismiss === 'cancel') { 
// NO
        }
      })

}

function inicio() {
	$("#criterio").keyup(cargar_productos_registrar)
	$("#Contenedor_pedidos").load("cargar_pedidos_registrados.php")
}


function mostrar_poup() {
	$("#productos").modal("show");
}

function traer_resumen(id) {
	$("#contenedor_resumen").load("traer_resumen_pedido.php",{id:id})
}

function eliminar_producto_pedido(id_producto_pedido, id_pedido) {
	$("#contenedor").load("eliminar_producto_pedido.php",{id_producto_pedido:id_producto_pedido,id_pedido:id_pedido})
}

function nuevo_producto() {	
	$("#registrar_producto_pedido").modal("show");
};
function cargar_productos_registrar(id) {
$("#contenedor_registrar_productos").load("cargar_productos_registrar.php",{id:id});
	
}
function validar_cantidad(id) {

	var cantidad_ingrediente=parseInt(document.getElementById("cantidad_registrar" + id).value);
	if(cantidad_ingrediente==null  || cantidad_ingrediente.length==0 || /^\s+$/.test(cantidad_ingrediente) || cantidad_ingrediente<0){
		var cantidad_ingrediente=document.getElementById("cantidad_registrar" + id).style.border="2px solid red";
		return false;
	} else if (isNaN(cantidad_ingrediente)) {
		var cantidad_ingrediente=document.getElementById("cantidad_registrar" + id).style.border="2px solid red";
		return false;
	}else{
		var cantidad_ingrediente=document.getElementById("cantidad_registrar" + id).style.border="2px solid green";
		return true;
	}
}

function registrar_producto_pedido(id,id_pedido,id_unidad_medida) {

if (validar_cantidad(id)==true) {
	var cantidad_ingrediente=parseInt(document.getElementById("cantidad_registrar" + id).value);
$("#contenedor").load("registrar_producto_pedido.php",{id:id,cantidad_ingrediente:cantidad_ingrediente,id_pedido:id_pedido,id_unidad_medida:id_unidad_medida});

}else{
	swal('Debe Agregar una cantidad','Si desea registrar un producto, Procure escribir la cantidad','warning')
}
}

function Eliminar_pedido_completo(id) {



     swal({
          title: 'Advertencia',
          text: "Esta a punto de eliminar el pedido completo",
      imageUrl: '../../../images/empty-trash.png',
							imageWidth: 600,
							imageHeight: 400,
							imageAlt: 'Custom image',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminarlo',
          cancelButtonText: 'No, Cancelar',
          buttonsStyling: true
        }).then(function() {
        // si
        $("#contenedor").load("eliminar_pedido_completo.php",{id:id})

        }, function(dismiss) {
          // dismiss can be 'cancel', 'overlay', 'close', 'timer'
          if (dismiss === 'cancel') { 
// NO
        }
      })


}

function cancelar_produccion(id) {

 swal({
          title: 'Advertencia',
          text: "Desea Cancelar El Pedido?",
          // type: 'warning',

              customClass: 'animated tada',
              imageUrl: '../../../images/alarm-bell-icon-4.png',
              imageWidth: 400,
              imageHeight: 200,
              imageAlt: 'Custom image', showCancelButton: true,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Cancelar Pedido',
          cancelButtonText: 'No,',
          buttonsStyling: true
        }).then(function() {
        // si
	$("#contenedor").load("cancelar_produccion.php",{id:id});
        }, function(dismiss) {
          // dismiss can be 'cancel', 'overlay', 'close', 'timer'
          if (dismiss === 'cancel') { 
// NO

}


      })


}
</script>
</html>