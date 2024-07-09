
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
          <a href="crear_criterio.php" class="btn btn-primary">Crear Area <i class=" icon icon-location"></i></a>

        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h1>Consultar Area <i class=" icon icon-location"></i></h1>
          <p>Buscar Area</p>
          <div class="col-lg-7">
            <input type="text" name="criterio" id="criterio" class="form-control">
          </div>
        </div>
      </div>

      <div id="contenedor" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>

     
    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>

</body>


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
  }else{
    $("#contenedor").load("consulta.php",{criterio:criterio});
    var criterio=document.getElementById('criterio').style.border="2px solid green";
  }
}
</script>
<?php include '../include/footer.php'; ?>
