
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
          <h1>Consultar Elemento <i class=" icon  icon-leaf"></i></h1>
          <p>Buscar Elemento</p>
          <div class="col-lg-7">
            <input type="text" name="criterio" id="criterio" name="criterio" class="form-control">
          </div>
        </div>
      </div>
</form>
      <div id="contenedor" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>

     
    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>

</body>



<?php include '../include/footer.php'; ?>

<script>
$(document).ready(inicio);


function inicio() {
  consulta_automatica();
  $("#criterio").keyup(consulta_automatica);
}

function consulta_automatica() {
  var criterio=document.getElementById('criterio').value;

  if(/[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(criterio)){
    var criterio=document.getElementById('criterio').style.border="2px solid red";
    return false
  }else{
    $("#contenedor").load("consulta.php",{criterio:criterio});
    var criterio=document.getElementById('criterio').style.border="2px solid green";
    return true
  }
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
if (consulta_automatica()==true) {

    var formulario=document.getElementById('formulario').action="exportar_registros_pdf.php";
          $("#formulario").submit();
        }else{
swal('Advertencia','Si desea Exportar, debe escribir un criterio valido','warning')

        }
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
if (consulta_automatica()==true) {

    var formulario=document.getElementById('formulario').action="exportar_registros_xs.php";
          $("#formulario").submit();
        }else{
swal('Advertencia','Si desea Exportar, debe escribir un criterio valido','warning')

        }
}


      })

}
</script>
