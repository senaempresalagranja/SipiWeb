
<!DOCTYPE html>
<html lang="en">
<?php
include '../include/head.php';
?>
<body>

  <?php
  include '../include/menu.php';
  ?>
  <!-- Page Content -->
  <div class="right_col" role="main">
    <div class="container-fluid xyz">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
          <a href="#" class="btn btn-danger" onclick="exportar_pdf()"><i class=" fa fa-file-pdf-o"></i> Exportar Pdf</a>

        </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
          <a href="#" class="btn btn-success" onclick="exportar_excel()"><i class=" fa fa-file-excel-o"></i> Exportar Excel</a>

        </div>
      </div>
      <form id="formulario" action="" method="post">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h1>Consultar Pedidos <i class=" fa fa-phone"></i></h1>
          <p>Buscar Pedidos</p>
          <div class="col-lg-3">
            <span>Fecha 1</span>
            <input type="date" name="Fecha_1" id="Fecha_1" class="form-control">
          </div>
               <div class="col-lg-3">
                <span>Fecha 2</span>
            <input type="date" name="Fecha_2" id="Fecha_2" class="form-control">
          </div>
           <div class="col-lg-3">
            <span>Consultar</span>
            <button type="button" class="btn btn-danger form-control" onclick="consulta_automatica()" title="Consultar"><h1 class="fa fa-search"></h1> Consultar</button>
          </div>
        </div>
      </div>
</form>
      <div id="contenedor" class="row table-responsive" style="height: 400px; overflow: auto;"></div>

     
    </div>
  </div>
  <!-- /#page-content-wrapper -->
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
</div>

</body>



<?php include '../include/footer.php'; ?>

<script>
$(document).ready(inicio);


function inicio() {
  consulta_automatica();
}

function mostrar_poup() {
  $("#productos").modal("show");
}

function traer_resumen(id) {
  $("#contenedor_resumen").load("traer_resumen_pedido.php",{id:id})
}


function consulta_automatica() {
 var Fecha_1=document.getElementById('Fecha_1').value;
    var Fecha_2=document.getElementById('Fecha_2').value;
    $("#contenedor").load("consulta.php",{Fecha_1:Fecha_1,Fecha_2:Fecha_2});
  }


function exportar_pdf() {

     swal({
          title: 'Advertencia',
          text: "Exportar Todos los Registros de la base de datos",
          // type: 'warning',

              customClass: 'animated tada',
              imageUrl: '../../../images/modif_pdf.png',
              imageWidth: 400,
              imageHeight: 200,
              imageAlt: 'Custom image', showCancelButton: true,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Exportar Todos',
          cancelButtonText: 'No, Solo Registros en pantalla',
          buttonsStyling: true
        }).then(function() {
        // si
        var formulario=document.getElementById('formulario').action="exportar_todos_registros_pdf.php";
          $("#formulario").submit();
        }, function(dismiss) {
          // dismiss can be 'cancel', 'overlay', 'close', 'timer'
          if (dismiss === 'cancel') { 
// NO
    var formulario=document.getElementById('formulario').action="exportar_registros_pdf.php";
          $("#formulario").submit();
}


      })


}

function exportar_excel() {
  swal({
          title: 'Advertencia',
          text: "Exportar Todos los Registros de la base de datos",
          // type: 'warning',

              customClass: 'animated tada',
              imageUrl: '../../../images/excel-xls-icon.png',
              imageWidth: 400,
              imageHeight: 200,
              imageAlt: 'Custom image', showCancelButton: true,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Exportar Todos',
          cancelButtonText: 'No, Solo Registros en pantalla',
          buttonsStyling: true
        }).then(function() {
        // si
        var formulario=document.getElementById('formulario').action="exportar_todos_registros_xs.php";
          $("#formulario").submit();
        }, function(dismiss) {
          // dismiss can be 'cancel', 'overlay', 'close', 'timer'
          if (dismiss === 'cancel') { 
// NO
var formulario=document.getElementById('formulario').action="exportar_registros_xs.php";
          $("#formulario").submit();
}


      })

}
</script>
