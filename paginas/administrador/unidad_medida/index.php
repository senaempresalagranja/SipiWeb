
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
        <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12 text-right">
          <a href="crear_criterio.php" class="btn btn-primary">Crear Unidad de Medida<i class=" icon icon-crop"></i></a>

        </div>
      </div>
      <div class="row">
        <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12">
          <h1>Consultar Unidad de Medida<i class=" icon icon-crop"></i></h1>
          <p>Buscar Unidad</p>
          <div class="col-lg-7">
            <input type="text" name="criterio" id="criterio" class="form-control">
          </div>
        </div>
      </div>

      <div id="contenedor" class="col-xs-10 col-sm-12 col-md-12 col-lg-12"></div>

      <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
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
