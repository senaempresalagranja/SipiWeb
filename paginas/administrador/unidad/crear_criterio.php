
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
          <h1 >Nueva Unidad <i class=" icon icon-eyedropper"></i> </h1>
        </div>
      </div>
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <input type="text" name="" class="form-control has-feedback-left" placeholder="Nombre Unidad" id="criterio" title="Nombre Unidad" >
          <span class="icon  icon-eyedropper form-control-feedback left" aria-hidden="true"></span>
        </div>
            <
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group has-feedback">
            <select name="" id="Area" class="form-control has-feedback-left" title="Area" onchange="validar_Area()">
             <option class="btn" value="Selecciona">Selecciona Area</option>
       
             <?php 
             $sql="SELECT * FROM `area` ";

             $res=mysqli_query($conexion,$sql);

             while($row=mysqli_fetch_row($res))
             {
              ?>
              <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
              <?php
            }
            ?>
          </select>
          <span class="icon  icon-location form-control-feedback left" aria-hidden="true"></span>
        </div>
      </div>
      <div class="row">
        <br>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <button type="button" name="button" class="btn btn-primary" title="Registrar" onclick="registrar()"> <h4 class="icon  icon-floppy-disk"></h4> </button>
        </div>
      </div>
      <div id="contenedor">

      </div>



      <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
    </div>
  </div>



</body>


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
  if (validar_criterio()==true && validar_Area()==true) {
  var criterio=document.getElementById('criterio').value;
   var Area=document.getElementById('Area').value;

$("#contenedor").load("registrar_criterio.php",{criterio:criterio,Area:Area})
  }else{

    swal('Error','Algunos Campos Estan Vacios o Incorrectos','error')
  }

}

function validar_Area() {
  var Area=document.getElementById('Area').value;
  if (Area=="Selecciona") {
    var Area=document.getElementById('Area').style.border="2px solid red";

    return false;
  }else{
    var Area=document.getElementById('Area').style.border="2px solid green";
    return true;
  }
}

</script>

<?php include '../include/footer.php'; ?>

</html>
