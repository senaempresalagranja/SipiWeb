
<!DOCTYPE html>
<html lang="en">
<?php
include '../include/conexion.php';
include '../include/head.php';

$criterio=$_POST["criterio"];
$query="SELECT `id_Elemento`, `Nombre_Elemento`, `id_unidad_medida`, `valor_Elemento`, `Tipo_Materia_Prima`, `stock` FROM `elemento` WHERE `id_Elemento`='$criterio' ";
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
        <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12">
          <h1 >Elemento <?php echo "$fila[1] ($fila[4])"; ?> <i class=" icon icon-leaf"></i> </h1>
        </div>
      </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">

          <input type="text" name="" class="form-control has-feedback-left" id="Nombre_Elemento" placeholder="Nombre ELemento" title="Nombre Elemento">
          <span class="icon  icon-leaf form-control-feedback left" aria-hidden="true"></span>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group has-feedback">

          <select name="" id="id_unidad_medida" title="Unidad de Medida" class="form-control has-feedback-left">
           <option class="btn" value="Selecciona">Selecciona Unidad M</option>

           <?php 
           $sql="SELECT * FROM `unidad_medida` ";

           $res=mysqli_query($conexion,$sql);

           while($row=mysqli_fetch_row($res))
           {
            ?>
            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
            <?php
          }
          ?>
        </select>
        <span class="icon icon-crop form-control-feedback left" aria-hidden="true"></span>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 form-group has-feedback">
        <input type="number" name="" title="Precio Elemento" class="form-control has-feedback-left" id="Precio_Elemento" placeholder="Precio Elemento">
        <span class="icon icon-coin-dollar form-control-feedback left" aria-hidden="true"></span>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 form-group has-feedback">
        <input type="button" value="Materia Prima" class="form-control has-feedback-left" id="Tipo_Elemento" onclick="cambiar_tipo()" title="Tipo de Elemento">
         <span class="fa fa-check-circle form-control-feedback left" aria-hidden="true"></span>
      </div>
    </div>
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group has-feedback">
        <input type="number" name="" title="Stock" class="form-control has-feedback-left" id="Stock" placeholder="Stock Elemento">
        <span class="icon icon-notification form-control-feedback left" aria-hidden="true"></span>
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

  <?php echo "<script>

      var Nombre_Elemento=document.getElementById('Nombre_Elemento').value='$fila[1]';
      var id_unidad_medida=document.getElementById('id_unidad_medida').value='$fila[2]';
      var Precio_Elemento=document.getElementById('Precio_Elemento').value='$fila[3]';
      var Tipo_Elemento=document.getElementById('Tipo_Elemento').value='$fila[4]';
      var Stock=document.getElementById('Stock').value='$fila[5]';

  </script>"; ?>

      <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
    </div>
  </div>



</body>

<?php include '../include/footer.php'; ?>
<script>
 $(document).ready(inicio);


  function inicio() {

    $("#Nombre_Elemento").keyup(validar_Nombre_Elemento);
$("#id_unidad_medida").change(validar_id_unidad_medida);
$("#Precio_Elemento").keyup(validar_Precio_Elemento);
$("#Stock").keyup(validar_Stock);
  }

  function validar_Nombre_Elemento() {

     var Nombre_Elemento=document.getElementById('Nombre_Elemento').value;
  Nombre_Elemento=Nombre_Elemento.toLowerCase();

  if(Nombre_Elemento==null  || Nombre_Elemento.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_Elemento)){
    var Nombre_Elemento=document.getElementById('Nombre_Elemento').style.border="2px solid red";
    return false;
  }else if (isNaN(Nombre_Elemento)==false) {
    var Nombre_Elemento=document.getElementById('Nombre_Elemento').style.border="2px solid red";
    return false;
  }else if (Nombre_Elemento.length>50) {

  }else{
    var Nombre_Elemento=document.getElementById('Nombre_Elemento').style.border="2px solid green";
    return true;
  }
  }
function actualizar() {
 if (validar_Nombre_Elemento()==true  && validar_id_unidad_medida()==true && validar_Precio_Elemento()==true  && validar_Stock()==true) {
 var Nombre_Elemento=document.getElementById('Nombre_Elemento').value;
      var id_unidad_medida=document.getElementById('id_unidad_medida').value;
      var Precio_Elemento=document.getElementById('Precio_Elemento').value;
      var Tipo_Elemento=document.getElementById('Tipo_Elemento').value;
      var Stock=document.getElementById('Stock').value;
$("#contenedor").load("actualizar.php",{Nombre_Elemento:Nombre_Elemento,id_unidad_medida:id_unidad_medida,Precio_Elemento:Precio_Elemento,Tipo_Elemento:Tipo_Elemento,Stock:Stock,id_criterio:id_criterio})
  }else{

    swal('Error','Algunos Campos Estan Vacios o Incorrectos','warning')
  }

}



  function cambiar_tipo() {
    var Tipo_Elemento=document.getElementById("Tipo_Elemento").value;

    if (Tipo_Elemento=="Materia Prima") {
      var Tipo_Elemento=document.getElementById("Tipo_Elemento").value="Insumo";  
      return true;  
    }else if (Tipo_Elemento=="Insumo"){
      var Tipo_Elemento=document.getElementById("Tipo_Elemento").value="Materia Prima";  
      return true;  
    }else{
      swal('Intento de Hackeo','Su cuenta sera desactivada','warning')
      return false;   
    }
  }

  function validar_id_unidad_medida() {
  var id_unidad_medida=document.getElementById('id_unidad_medida').value;
  if (id_unidad_medida=="Selecciona") {
    var id_unidad_medida=document.getElementById('id_unidad_medida').style.border="2px solid red";

    return false;
  }else{
    var id_unidad_medida=document.getElementById('id_unidad_medida').style.border="2px solid green";
    return true;
  }
}



function validar_Precio_Elemento () {
 var Precio_Elemento=document.getElementById('Precio_Elemento').value;
 if(Precio_Elemento==null  || Precio_Elemento.length==0 || /^\s+$/.test(Precio_Elemento) || Precio_Elemento<0){
  var Precio_Elemento=document.getElementById('Precio_Elemento').style.border="2px solid red";
  return false;
} else if (isNaN(Precio_Elemento)) {
  var Precio_Elemento=document.getElementById('Precio_Elemento').style.border="2px solid red";
  return false;
}else{
  var Precio_Elemento=document.getElementById('Precio_Elemento').style.border="2px solid green";
  return true;
}

}

function validar_Stock () {
 var Stock=document.getElementById('Stock').value;
 if(Stock==null  || Stock.length==0 || /^\s+$/.test(Stock) || Stock<0){
  var Stock=document.getElementById('Stock').style.border="2px solid red";
  return false;
} else if (isNaN(Stock)) {
  var Stock=document.getElementById('Stock').style.border="2px solid red";
  return false;
}else{
  var Stock=document.getElementById('Stock').style.border="2px solid green";
  return true;
}

}
</script>

</html>
