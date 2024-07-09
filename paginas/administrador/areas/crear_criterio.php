
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h1 >Nueva Area <i class=" icon icon-location"></i> </h1>
        </div>
      </div>
      <div class="row">
          <span class="help-block">Nombre Area</span>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">
          <input type="text" name="" class="form-control has-feedback-left" id="criterio" >
           <span class="icon  icon-location form-control-feedback left" aria-hidden="true"></span>
        </div>
      </div>
      <div class="row">
        <br>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <button type="button" name="button" class="btn btn-primary" title="Registrar" onclick="registrar()"> <h4 class="icon  icon-floppy-disk"></h4> </button>
        </div>
      </div>
      <div id="contenedor">

      </div>



      <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
    </div>
  </div>



</body>

<?php include '../include/footer.php'; ?>
<script>
$(document).ready(inicio);


function inicio() {

  $("#criterio").keyup(validar_criterio)

}

function validar_criterio() {

  var criterio=document.getElementById('criterio').value;
  if(criterio==null  || criterio.length==0 || /^\s+$/.test(criterio) || criterio<0){
    var criterio=document.getElementById('criterio').style.border="2px solid red";
    return false;
  }	else{
    var criterio=document.getElementById('criterio').style.border="2px solid green";
    return true;
  }

}

function registrar() {
  if (validar_criterio()==true) {
  var criterio=document.getElementById('criterio').value;
$("#contenedor").load("registrar_criterio.php",{criterio:criterio})
  }else{

    swal('Error','Algunos Campos Estan Vacios o Incorrectos','error')
  }

}

</script>

</html>
