
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
  <div class="col-md-8">
    <h1><i class="icon  icon-pie-chart"></i> Inventario de Elementos</h1>
  </div>
    <div class="col-md-4">
    <button class="btn btn-danger" title="Imprimir Inventario Total" onclick="imprimir()"><h1><i class="icon icon-printer"></i></h1></button>
  </div>
</div>

 <div class="row">
   <div class="col-lg-12">
<h1>Consultar Elemento</h1>
<p>Buscar Elemento por nombre:</p>
<div class="col-lg-7">
  <input type="text" name="producto" id="producto" class="form-control">
</div>
   </div>
 </div>

<div id="contenedor"></div>
<div id="Imprimir"></div>
                <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</body>

  
 <?php include '../include/footer.php'; ?>
<script>

  function imprimir() {
let timerInterval
swal({
  title: 'Imprimiendo Inventario Completo!',
  html: 'Espere....',
  timer: 10000,
  customClass: 'animated tada',
   imageUrl: '../../../img/imprimiendo.png',
   imageWidth: 400,
   imageHeight: 200,
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
    console.log('I was closed by the timer')
  }
})
    $("#Imprimir").load("imprimir_inventario.php")
  }
$(document).ready(inicio);


function inicio() {
  consulta_automatica();
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
</script>
  

</html>