
<!DOCTYPE html>
<html lang="en">
<?php
include '../include/conexion.php';
include '../include/head.php';

$criterio=$_POST["criterio"];
$query="SELECT * FROM `unidad` WHERE id_Unidad='$criterio' ";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
echo "<script>
var id_criterio=$fila[0];

</script>";
?>
<body>

  <?php
  include '../include/menu.php';

  ?>
  <!-- Page Content -->
  <div class="right_col" role="main">
    <div class="container-fluid xyz">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group has-feedback">
          <h1 >Unidad <?php echo "$fila[1]"; ?> <i class=" icon icon-location"></i> </h1>
        </div>
      </div>
      <div class="row">
       
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">
          <input type="text" name="" value="<?php echo  $fila[1] ?>" class="form-control has-feedback-left" id="criterio" title="Nombre Unidad">
              <span class="icon  icon-eyedropper form-control-feedback left" aria-hidden="true"></span>
        </div>

            
                          <div class="col-xs-9 col-sm-9 col-md-3 col-lg-3">
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
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <button type="button" name="button" class="btn btn-primary" title="Actualizar" onclick="actualizar()"> <h4 class="icon   icon-spinner10"></h4> </button>
        </div>
      </div>
      <div id="contenedor">

      </div>



      <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
    </div>
  </div>
<?php echo "<script>

 var Area=document.getElementById('Area').value='$fila[2]';
</script>" ?>


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

function actualizar() {
   if (validar_criterio()==true && validar_Area()==true) {
  var criterio=document.getElementById('criterio').value;
     var Area=document.getElementById('Area').value;
$("#contenedor").load("actualizar.php",{criterio:criterio,id_criterio:id_criterio,Area:Area})
  }else{

    swal('Error','Algunos Campos Estan Vacios o Incorrectos','warning')
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

</html>
