<!DOCTYPE html>
<html lang="en">
<?php 
include '../include/head.php';

?>
<body>
	<?php include '../include/menu.php';  ?>
	<div class="right_col" role="main">
		
		<div class="row">
		<!-- 	<div class="col-md-12  text-right"><a href="index.php" class="btn btn-danger btn-md"><i class="fa fa-phone"></i> Nuevo Pedido</a></div> -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
				<h1 class="help-block"><i class="fa fa-cogs"></i> Producciones </h1>
				<hr>
			</div>
		</div>
<div class="row">
	<div class="col-md-12"><h3>Lista de Lotes de Produccion <li class="fa fa-cog"></li></h3></div>
	<hr>
</div>
<div class="row table-responsive" style="height: 400px; overflow: auto;">
<table class="table  table-bordered" id="Contenedor_pedidos">
	
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
					<h1 class="modal-title">RESUMEN DE PRODUCCION <i class="fa fa-cogs"></i></h1>

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

function inicio() {

	$("#Contenedor_pedidos").load("cargar_pedidos_registrados.php")
}


function mostrar_poup() {
	$("#productos").modal("show");
}

function traer_resumen(id) {
	$("#contenedor_resumen").load("traer_resumen_pedido.php",{id:id})
}

function finalizar_produccion(id) {
swal({
          title: 'Advertencia',
          text: "Desea Finalizar la Produccion",
          // type: 'warning',

              customClass: 'animated tada',
              imageUrl: '../../../images/logo.png',
              imageWidth: 400,
              imageHeight: 200,
              imageAlt: 'Custom image', showCancelButton: true,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, La produccion ya termino',
          cancelButtonText: 'No, Aun no ha terminado',
          buttonsStyling: true
        }).then(function() {
        // si
	$("#contenedor").load("finalizar_produccion.php",{id:id});
        }, function(dismiss) {
          // dismiss can be 'cancel', 'overlay', 'close', 'timer'
          if (dismiss === 'cancel') { 
// NO

}


      })
}
</script>
</html>