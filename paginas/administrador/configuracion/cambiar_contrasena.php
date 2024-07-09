
<!DOCTYPE html>
<html lang="en">
<?php
include '../include/head.php';
 ?>
<body>

<?php
include '../include/menu.php';

echo "<script>

var Rol='$usuario_sesion';

</script>";
 ?>
        <div class="right_col" role="main">
            <div class="container-fluid xyz">
              
<div class="row">
  <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12">
    
    <h1 class="icon icon-user text-center">Cambiar Constraseña <?php echo "$fila[1]"; ?></h1>
  </div>
</div>


<div class="row">
<br><br>
  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
          
         
          <label for="dirreccion">Contraseña Actual</label>
          <div id="elemento_contraseña_actual">
            <input type="password" placeholder="Contraseña" name="contraseña_actual"  class="form-control filestyle"  id="contraseña_actual">
            <span class=""></span>
          </div>

       
        </div>







  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">

          <label for="dirreccion">Contraseña Nueva</label>
          <div id="elemento_contraseña_nueva">
            <input type="password" name="contraseña_nueva"  class="form-control filestyle"  id="contraseña_nueva">
            <span class=""></span>
          </div>

      
        </div>

     
 
  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
 
          <label for="dirreccion">Repita Contraseña</label>
          <div id="elemento_repita_contraseña">
            <input type="password" name="repita_contraseña"  class="form-control filestyle"  id="repita_contraseña">
            <span class=""></span>
          </div>

     
        </div>




</div>
<br><br>
  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">

<input type="button" value="Actualizar" onclick="actualizar()" class="btn btn-primary form-control">
        </div>



</div>



    




       
 








<div class="col-md-12" id="contenedor">
  


</div>

                <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</body>

 

</html>

<script>
$(document).ready(function(){
    $(document).bind("contextmenu", function(e){
        return false;
    });
});

$(document).ready(inicio);

function contraseña_igual() {


var contraseña_nueva=document.getElementById('contraseña_nueva').value;
var repita_contraseña=document.getElementById('repita_contraseña').value;


if (contraseña_nueva==repita_contraseña) {

return true;


}else{


return false;


}



}


function actualizar() {

if (validar_contraseña_actual()==true && validar_contraseña_nueva()==true && validar_repita_contraseña()==true) {


if (contraseña_igual()==true) { 



var contraseña_actual=document.getElementById('contraseña_actual').value;
var contraseña_nueva=document.getElementById('contraseña_nueva').value;
$('#contenedor').load('actualizar_contrasena.php',{Rol:Rol,contraseña_actual:contraseña_actual,contraseña_nueva:contraseña_nueva});



}else{

swal("ERROR","Contraseñas Diferentes","error");
var contraseña_nueva=document.getElementById('contraseña_nueva').value='';
var repita_contraseña=document.getElementById('repita_contraseña').value='';


}


}else{
  swal("ERROR","Algunos Campos Estan Vacios o Incorrectos Porfavor Reviselos","error");


}
}
  

function inicio() {



$('#usuario').keyup(validar_usuario);
$("#contraseña_actual").keyup(validar_contraseña_actual);
$("#contraseña_nueva").keyup(validar_contraseña_nueva);
$("#repita_contraseña").keyup(validar_repita_contraseña);
$(document).keyup(contraseña_igual);  
}


function validar_usuario () {
      var usuario=document.getElementById('usuario').value;
      if(usuario==null  || usuario.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(usuario)){
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_usuario").attr("class", "form-group has-error  has-feedback");
        $("#usuario").parent().children("span").text("").show();
        $("#usuario").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (isNaN(usuario)==false) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_usuario").attr("class", "form-group has-error has-feedback");
        $("#usuario").parent().children("span").text("").show();
        $("#usuario").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (usuario.length>30) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_usuario").attr("class", "form-group has-error has-feedback");
        $("#usuario").parent().children("span").text("").show();
        $("#usuario").parent().append('<span id="icono_texto" class=" icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else{


        $("#usuario").parent().children("span").text("").show();
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_usuario").attr("class", "form-group has-success has-feedback");
        $("#usuario").parent().append('<span id="icono_texto" class=" icon  icon-checkmark form-control-feedback"></span>');

        return true;
      }

}



    

 function validar_contraseña_actual () {

      var contraseña_actual=document.getElementById('contraseña_actual').value;
      if(contraseña_actual==null  || contraseña_actual.length==0 || /^\s+$/.test(contraseña_actual)){
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_actual").attr("class", "form-group has-error  has-feedback");
        $("#contraseña_actual").parent().children("span").text("").show();
        $("#contraseña_actual").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (contraseña_actual.length>70) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_actual").attr("class", "form-group has-error has-feedback");
        $("#contraseña_actual").parent().children("span").text("").show();
        $("#contraseña_actual").parent().append('<span id="icono_texto" class=" icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else{


        $("#email").parent().children("span").text("").show();
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_actual").attr("class", "form-group has-success has-feedback");
        $("#contraseña_actual").parent().append('<span id="icono_texto" class=" icon  icon-checkmark form-control-feedback"></span>');

        return true;
      }

}


 function validar_contraseña_nueva () {

      var contraseña_nueva=document.getElementById('contraseña_nueva').value;
      if(contraseña_nueva==null  || contraseña_nueva.length==0 || /^\s+$/.test(contraseña_nueva)){
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_nueva").attr("class", "form-group has-error  has-feedback");
        $("#contraseña_nueva").parent().children("span").text("").show();
        $("#contraseña_nueva").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (contraseña_nueva.length>70) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_nueva").attr("class", "form-group has-error has-feedback");
        $("#contraseña_nueva").parent().children("span").text("").show();
        $("#contraseña_nueva").parent().append('<span id="icono_texto" class=" icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else{


        $("#contraseña_nueva").parent().children("span").text("").show();
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_nueva").attr("class", "form-group has-success has-feedback");
        $("#contraseña_nueva").parent().append('<span id="icono_texto" class=" icon  icon-checkmark form-control-feedback"></span>');

        return true;
      }

}



function validar_repita_contraseña () {


      var repita_contraseña=document.getElementById('repita_contraseña').value;
      if(repita_contraseña==null  || repita_contraseña.length==0 || /^\s+$/.test(repita_contraseña)){
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_repita_contraseña").attr("class", "form-group has-error  has-feedback");
        $("#repita_contraseña").parent().children("span").text("").show();
        $("#repita_contraseña").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (repita_contraseña.length>70) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_repita_contraseña").attr("class", "form-group has-error has-feedback");
        $("#repita_contraseña").parent().children("span").text("").show();
        $("#repita_contraseña").parent().append('<span id="icono_texto" class=" icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else{


        $("#repita_contraseña").parent().children("span").text("").show();
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_repita_contraseña").attr("class", "form-group has-success has-feedback");
        $("#repita_contraseña").parent().append('<span id="icono_texto" class=" icon  icon-checkmark form-control-feedback"></span>');

        return true;
      }

}




</script>


<?php
include '../include/footer.php';
 ?>

</body>


</html>