
<!DOCTYPE html>
<html lang="en">
<?php
include '../include/head.php';
 ?>
<body>

<?php
include '../include/menu.php';
 ?>

  <?php 

$id_usuario=$_REQUEST["id_usuario"];



$query="SELECT * FROM usuarios  WHERE Id_usuario='$id_usuario' ";

$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

  ?>

        <div class="right_col" role="main">
            <div class="container-fluid xyz">



<div class="row">
  <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12">
    <h1>Editar Usuario</h1>
  </div>
</div>
<form action="actualizar_usuario.php" id="formulario">
<div class="row">
<input type="hidden" name="" id="id_usuario" value="<?php echo $id_usuario ?>">
  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
  <h3>Usuario</h3>
  <input type="text" name="" id="usuario" value="<?php echo $fila[2] ?>" class="form-control">
  </div>
    <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
  <h3>Nombre Usuario</h3>
  <input type="text" name="" id="nombre" value="<?php echo $fila[1] ?>" class="form-control">
  </div>
  <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
      <h3>Rol</h3>
    <select name="rol" class="form-control" id="rol" onclick="validar_rol()">
    <option selected  value="Administrador">Administrador</option>
      <option value="Consulta">Consulta</option>

  
    </select>
  </div>
    <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
      <h3>Activo</h3>
    <select name="rol" class="form-control" id="estado" onclick="validar_estado()">
    <option value="Selecciona">Selecciona</option>
      <?php 

if ($fila[4]==0) {
  ?>
      <option selected value="0">Activo</option>
      <option value="1">Inactivo</option>
<?php 

}else{

  ?>

        <option  value="0">Activo</option>
      <option selected value="1">Inactivo</option>
      <?php 
}
       ?>
    </select>
  </div>
</div>

</form>
<div class="row">
  <div class="col-md-12">
    <input type="button" value="Actualizar Usuario" onclick="actualizar_usuario()" class="btn ">
  </div>
</div>

<div id="contenedor"></div>

        <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</body>
<?php echo "<script>

var rol=document.getElementById('rol').value='$fila[3]';
</script>" ?>

<script>
  
  $(document).ready(inicio);

  function inicio() {

$("#usuario").keyup(validar_usuario);
$("#nombre").keyup(validar_nombre);
  }


  function actualizar_usuario() {
    if (validar_usuario()==true && validar_rol()==true && validar_estado()==true&& validar_nombre()==true) {
 var usuario=document.getElementById('usuario').value;
var rol=document.getElementById("rol").value;
var estado=document.getElementById("estado").value;
var nombre=document.getElementById("nombre").value;
var id_usuario=document.getElementById('id_usuario').value;
$("#contenedor").load("actualizar_usuario.php",{nombre:nombre,usuario:usuario,rol:rol,estado:estado,id_usuario:id_usuario});

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