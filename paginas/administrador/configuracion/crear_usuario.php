
<!DOCTYPE html>
<html lang="en">
<?php
include '../include/head.php';
 ?>
<body>

<?php
include '../include/menu.php';
 ?>
        <div class="right_col" role="main">
            <div class="container-fluid xyz">



<div class="row">
  <div class="col-md-12">
    <h1>Crear Usuario</h1>
  </div>
</div>
<form action="actualizar_usuario.php" id="formulario">
<div class="row">
  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
  <h3>Usuario</h3>
  <input type="text" name="" id="usuario"  class="form-control">
  </div>
     <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
  <h3>Nombre Usuario</h3>
  <input type="text" name="" id="nombre" value="<?php echo $fila[1] ?>" class="form-control">
  </div>
  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
      <h3>Rol</h3>
    <select name="rol" class="form-control" id="rol" onclick="validar_rol()">
      <option value="Selecciona">Selecciona</option>
      <option   value="Administrador">Administrador</option>
<option value="Consulta">Consulta</option>
 
    </select>
  </div>
 <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
 <h3>Contraseña</h3>
 <input type="password" class="form-control" name="" id="contraseña">
 </div>

  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
 <h3>Repita Contraseña</h3>
 <input type="password" class="form-control" name="" id="contraseña_repita">
 </div> 
    <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
      <h3>Activo</h3>
    <select name="rol" class="form-control" id="estado" onclick="validar_estado()">
    <option value="Selecciona">Selecciona</option>
      <option selected value="0">Activo</option>
      <option value="1">Inactivo</option>


    </select>
  </div>
</div>

</form>
<div class="row">
  <div class="col-md-12">
    <input type="button" value="Crear Usuario" onclick="actualizar_usuario()" class="btn ">
  </div>
</div>

<div id="contenedor"></div>

        <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</body>


<script>
  
  $(document).ready(inicio);

  function inicio() {
$("#nombre").keyup(validar_nombre);
$("#usuario").keyup(validar_usuario);
$("#contraseña").keyup(validar_contraseña);
$("#contraseña_repita").keyup(validar_contraseña_repita);
  }

      function validar_nombre() {
   
         var nombre=document.getElementById('nombre').value;
      if(nombre==null  || nombre.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(nombre)){
  var nombre=document.getElementById('nombre').style.border="2px solid red"
        return false;

      }else if (nombre.length>50) {
var nombre=document.getElementById('nombre').style.border="2px solid red"
        return false;

      } else{
var nombre=document.getElementById('nombre').style.border="2px solid green"

      return true;
      } 

  }


function validar_contraseña() {
   var contraseña=document.getElementById('contraseña').value;
      if(contraseña==null  || contraseña.length==0){
  var contraseña=document.getElementById('contraseña').style.border="2px solid red"
        return false;

      }else if (contraseña.length>50) {
var contraseña=document.getElementById('contraseña').style.border="2px solid red"
        return false;

      } else{
var contraseña=document.getElementById('contraseña').style.border="2px solid green"

      return true;
      } 

}

function validar_contraseña_repita() {
   var contraseña_repita=document.getElementById('contraseña_repita').value;
      if(contraseña_repita==null  || contraseña_repita.length==0){
  var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red"
        return false;

      }else if (contraseña_repita.length>50) {
var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red"
        return false;

      } else{
var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid green"

      return true;
      } 

}

  function actualizar_usuario() {
    if (validar_usuario()==true && validar_rol()==true && validar_contraseña()==true && validar_contraseña_repita()==true && validar_estado()==true && validar_nombre()==true ) {


   var contraseña_repita=document.getElementById('contraseña_repita').value;
      var contraseña=document.getElementById('contraseña').value;


      if (contraseña==contraseña_repita) {
 var usuario=document.getElementById('usuario').value;
var rol=document.getElementById("rol").value;
var estado=document.getElementById("estado").value;
var nombre=document.getElementById("nombre").value;

$("#contenedor").load("crear.php",{nombre:nombre,usuario:usuario,rol:rol,estado:estado,contraseña:contraseña});


}else{
swal("Advertencia","Contraseñas Diferentes","error")
   var contraseña_repita=document.getElementById('contraseña_repita').value="";
      var contraseña=document.getElementById('contraseña').value="";

      var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red";
      var contraseña=document.getElementById('contraseña').style.border="2px solid red";
}

    }
  }


  function validar_usuario() {
   
         var usuario=document.getElementById('usuario').value;
      if(usuario==null  || usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(usuario)){
  var usuario=document.getElementById('usuario').style.border="2px solid red"
        return false;

      }else if (usuario.length>50) {
var usuario=document.getElementById('usuario').style.border="2px solid red"
        return false;

      } else{
var usuario=document.getElementById('usuario').style.border="2px solid green"

      return true;
      } 

  }


  function validar_rol() {
      var rol=document.getElementById("rol").value;
  if (rol=="Selecciona") {

var rol=document.getElementById('rol').style.border="2px solid red";
return false

  }else{
var rol=document.getElementById('rol').style.border="2px solid green";
return true
  }
  }


    function validar_estado() {
      var estado=document.getElementById("estado").value;
  if (estado=="Selecciona") {

var estado=document.getElementById('estado').style.border="2px solid red";
return false

  }else{
var estado=document.getElementById('estado').style.border="2px solid green";
return true
  }
  }
</script>
<?php
include '../include/footer.php';
 ?>



</html>