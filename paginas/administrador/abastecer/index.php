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
  <div class="col-md-12">

    <h1>Abastecer Inventario</h1>
    <p>Buscar producto por nombre :</p>
    <div class="col-md-7"><input type="text" name="producto" id="producto" class="form-control"></div>
  </div>
</div>
<div id="contenedor" class="container" style="height: 400px; width: 100%; overflow: auto;">

</div>
<div class="row">
  <div class="col-md-12 text-right">
    <a href="reabastecimientos.php" class="btn btn-danger">Finalizar Abastecimientos</a>
  </div>
</div>




                <span id="transmark" style="display: none; width: 0px; height: 0px; width: 100%;"></span>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</body>

  
 <script>
$(document).ready(inicio);


function inicio() {

$("#producto").keyup(consulta_automatica);
}

function consulta_automatica() {
var producto=document.getElementById('producto').value;

if(/[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(producto)){
var producto=document.getElementById('producto').style.border="2px solid red";
}else{
  $("#contenedor").load("consulta.php",{producto:producto});
 var producto=document.getElementById('producto').style.border="2px solid green"; 
}
}

function validar_cantidad(id) {
  var cantidad=document.getElementById('cantidad_abastecimiento' + id).value;

if(cantidad==null  || cantidad.length==0 || /^\s+$/.test(cantidad)|| cantidad<0){
var cantidad=document.getElementById('cantidad_abastecimiento' + id).style.border='2px solid red'; return false;

      }
      else if (isNaN(cantidad)) {
var cantidad=document.getElementById('cantidad_abastecimiento' + id).style.border='2px solid red'; return false;

      }else {
        
var cantidad=document.getElementById('cantidad_abastecimiento' + id).style.border='2px solid green';   
return true;
}
}


function validar(id) {
  if (validar_cantidad(id)==true && validar_unidad_medida(id) && validar_costo(id)==true) {
  var cantidad=document.getElementById('cantidad_abastecimiento' + id).value;
  var costo=document.getElementById('costo' + id).value;
  var id_unidad_medida=document.getElementById('id_unidad_medida' + id).value;

$('#contenedor_' + id).load('registrar_abastecimiento.php',{id:id,cantidad:cantidad,id_unidad_medida:id_unidad_medida,costo:costo});

  }
  
}

function validar_unidad_medida(id) {
  var id_unidad_medida=document.getElementById('id_unidad_medida' + id).value;
  if (id_unidad_medida=="Selecciona") {
    var id_unidad_medida=document.getElementById('id_unidad_medida' + id).style.border="2px solid red";

    return false;
  }else{
    var id_unidad_medida=document.getElementById('id_unidad_medida' + id).style.border="2px solid green";
    return true;
  }
  
}

function validar_costo(id) {
  var cantidad=document.getElementById('costo' + id).value;

if(cantidad==null  || cantidad.length==0 || /^\s+$/.test(cantidad)|| cantidad<0){
var cantidad=document.getElementById('costo' + id).style.border='2px solid red'; return false;

      }
      else if (isNaN(cantidad)) {
var cantidad=document.getElementById('costo' + id).style.border='2px solid red'; return false;

      }else {
        
var cantidad=document.getElementById('costo' + id).style.border='2px solid green';   
return true;
}
}
</script>

 <?php include '../include/footer.php'; ?>

</html>