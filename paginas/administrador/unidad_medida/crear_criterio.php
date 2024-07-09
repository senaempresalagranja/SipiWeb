
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
        <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12">
          <h1 >Nueva Unidad de Medida<i class=" icon icon-crop"></i> </h1>
        </div>
      </div>
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">
          <input type="text" name="" class="form-control has-feedback-left" placeholder="012746" id="Codigo"  title="Codigo Unidad de Medida">
             <span class="icon icon-crop form-control-feedback left" aria-hidden="true"></span>
        </div>
         
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">
          <input type="text" name="" class="form-control has-feedback-left" placeholder="Kilogramo" id="criterio" title="Nombre Unidad">
             <span class="icon icon-crop form-control-feedback left" aria-hidden="true" ></span>
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
  $("#Codigo").keyup(validar_Codigo);
}

function validar_Codigo () {
 var Codigo=document.getElementById('Codigo').value;
 if(Codigo==null  || Codigo.length==0 || /^\s+$/.test(Codigo) || Codigo<0){
  var Codigo=document.getElementById('Codigo').style.border="2px solid red";
  return false;
} else if (isNaN(Codigo)) {
  var Codigo=document.getElementById('Codigo').style.border="2px solid red";
  return false;
}else{
  var Codigo=document.getElementById('Codigo').style.border="2px solid green";
  return true;
}

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
  if (validar_Codigo()==true && validar_criterio()==true) {
  var criterio=document.getElementById('criterio').value;
  var Codigo=document.getElementById('Codigo').value;
$("#contenedor").load("registrar_criterio.php",{criterio:criterio,Codigo:Codigo})
  }else{

    swal('Error','Algunos Campos Estan Vacios o Incorrectos','error')
  }

}

</script>

</html>
