
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



     <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Formulatio Crear Producto <small class="icon  icon-barcode"></small></h2>
          
          <div class="clearfix"></div>
        </div>
        


        <!-- Smart Wizard -->
        <p>Este Formulario es para Crear un nuevo producto</p>
        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps">
            <li>
              <a href="#step-1">
                <span class="step_no">1</span>
                <span class="step_descr">
                  Fase 1<br />
                  <small>Fase 1 Datos Basicos</small>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-2">
                <span class="step_no">2</span>
                <span class="step_descr">
                  Fase 2<br />
                  <small>Fase 2 Añadir Elementos a Producto</small>
                </span>
              </a>
            </li>
            
          </ul>
          <div id="step-1">
           <!-- AQUI ES EL PRIMER STEÌP -->
           <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group has-feedback">

              <input type="text" name="" class="form-control has-feedback-left" id="Nombre_Producto" placeholder="Nombre Producto" title="Nombre producto">
              <span class="icon  icon-barcode form-control-feedback left" aria-hidden="true"></span>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 form-group has-feedback">
              <input type="number" name="" title="Precio Producto" class="form-control has-feedback-left" id="precio_producto" placeholder="Precio Producto">
              <span class="icon icon-coin-dollar form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 form-group has-feedback">
             <select name="" id="id_unidad_medida" title="unidad de medida" class="form-control has-feedback-left">
               <option class="btn" value="Selecciona">Selecciona Unidad de Medida</option>

               <?php 
               $sql="SELECT * FROM `unidad_medida` ";

               $res=mysqli_query($conexion,$sql);

               while($row=mysqli_fetch_row($res))
               {
                ?>
                <option value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>
                <?php
              }
              ?>
            </select>
            <span class="fa fa-check-circle form-control-feedback left" aria-hidden="true"></span>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group has-feedback">

            <select name="" id="id_empaque" title="Empaques" class="form-control has-feedback-left">
             <option class="btn" value="Selecciona">Selecciona Empaque</option>

             <?php 
             $sql="SELECT * FROM `empaques` ";

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
        
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group has-feedback">

          <input type="number" name="Cantidad_empaque" id="Cantidad_empaque" class="form-control has-feedback-left" placeholder="Cantidad en Empaque" title="Cantidad en Empaque">
          <span class="icon icon-crop form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 form-group has-feedback">
         <select name="" id="Id_Unidad" title="unidad" class="form-control has-feedback-left">
           <option class="btn" value="Selecciona">Selecciona Unidad</option>

           <?php 
           $sql="SELECT * FROM `unidad` ";

           $res=mysqli_query($conexion,$sql);

           while($row=mysqli_fetch_row($res))
           {
            ?>
            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
            <?php
          }
          ?>
        </select>
        <span class="fa fa-check-circle form-control-feedback left" aria-hidden="true"></span>
      </div>

    </div>
    <div class="row">
      <br>
      
    </div>

    <div id="contenedor">

    </div>

  </div>
  <div id="step-2">
    <h2 class="StepTitle">Asignar Elemento a Producto</h2>
    <!-- ---------------------------------------------------------------------------------------------- -->

    <div id="contenedor_ingredientes" class="row " >
      <div style="height:400px; overflow:auto;">
        <div class="">
          <div class="col-md-12">
            <h3 class="help-block">Seleccionar Elementos</h3>
            <hr>
          </div>
        </div>
        <button type="button" title="Seleccionar" onclick="mostrar_poup()" class="btn btn-danger"><h1 class="fa fa-check-square"></h1> Seleccione Elementos</button>
        <div class="" id="checks"><br>
          <div class="col-md-12 ">
            <table class="table table-bordered " id="tabla">
              <tr>
                <td>Selecciona</td>
                <td>Cantidad</td>
                <td></td>
              </tr>
            </table>
          </div>
        </div>







      </div>





    </div>
  </div>
  

</div>



<span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
</div>
</div>

<div class="modal fade" id="elementos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h1 class="modal-title">SELECCIONA ELEMENTOS</h1>

      </div>
      <div class="modal-body">

       <div class="container">
        <div class="col-md-12 ">
          <input type="text" placeholder="Filtro" class="form-control" id="criterio">
          <hr>
          <br>
          <h2 class="help-block">Seleccione lo elementos necesarios</h2>
          <table class="table table-bordered table-condensed" id="contenedor_registros">


          </table>
        </div>
      </div>


    </div>
    <div class="modal-footer">

      <a href="#" data-dismiss="modal" class="btn btn-danger fa fa-remove"> Cerrar</a>
    </div>
  </div>
</div>
</div>

</body>

<?php include '../include/footer.php'; ?>
<script>
  function mostrar_poup() {

    $("#elementos").modal("show");
    consulta_automatica();
  }

  $(document).ready(inicio);


  function chekear_auto(id) {

    if (document.getElementById("row" + id)) {
     var chekacti=document.getElementById("check_poup" + id).checked='true';

   }


 }

 function agregar_check(id,nombre) {
  var chekacti=document.getElementById("check_poup" + id);
  if (chekacti.checked==true) {
   if (document.getElementById("row" + id)) {

   }else{
    var table = document.getElementById('tabla');
    {
      var row = table.insertRow(1);
      row.id="row" + id;
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);

      cell1.innerHTML = "<input type='checkbox' name='materia' value=" + id +"  Id="+"check" + id +"   checked='true'> " + nombre;
      cell2.innerHTML =" <input style='display: block; ' type='number' id=" + id +" placeholder='Cantidad de Elemento' class='form-control'>";
      cell3.innerHTML ="<button class='btn btn-danger ' title='Retirar Elemento' onclick='eliminar_row(" + id+")'><h6 class='icon icon-bin'></h6></button>";


    }



  }
}else{

  eliminar_row(id)
}







}

function eliminar_row(id) {
  document.getElementById("row" + id).innerHTML="";
  document.getElementById("row" + id).id="diferente";
}


function mostrar_cantidad(e) {


 if (e.target.checked==true) {
   document.getElementById(e.target.value).style.display="inline";


 }else{
  document.getElementById(e.target.value).style.display="none";
}


}

function validar_cantidad(e) {

 var cantidad_ingrediente=document.getElementById(e.target.id).type="number";
 var cantidad_ingrediente=parseInt(document.getElementById(e.target.id).value);
 if(cantidad_ingrediente==null  || cantidad_ingrediente.length==0 || /^\s+$/.test(cantidad_ingrediente) || cantidad_ingrediente<0){
  var cantidad_ingrediente=document.getElementById(e.target.id).style.border="2px solid red";
  return false;
} else if (isNaN(cantidad_ingrediente)) {
  var cantidad_ingrediente=document.getElementById(e.target.id).style.border="2px solid red";
  return false;
}else{
  var cantidad_ingrediente=document.getElementById(e.target.id).style.border="2px solid green";
  return true;
}
}

function registrar_ingredientes(id_producto) {
  var id_producto=id_producto;
  var checactivado=$("#contenedor_ingredientes :checkbox");
  var contador_ingrediente=0;

  for (var i = checactivado.length - 1; i >= 0; i--) {
    if (checactivado[i].checked==true) {

      var total_veces= checactivado.length;
      contador_ingrediente=contador_ingrediente+1;



      var ingrediente=checactivado[i].value;
      var cantidad=document.getElementById(checactivado[i].value).value;





      $("#contenedor").load("registrar_ingredientes.php",{id_producto:id_producto,ingrediente:ingrediente,cantidad:cantidad});
    }

  }

  nuevo_registro()


}
function nuevo_registro() {
  var Nombre_Producto=document.getElementById('Nombre_Producto').value="";
  var id_empaque=document.getElementById('id_empaque').value="Selecciona";
  var precio_producto=document.getElementById('precio_producto').value="";
  var id_unidad_medida=document.getElementById('id_unidad_medida').value="Selecciona";


  var Id_Unidad=document.getElementById('Id_Unidad').value="Selecciona";


  consulta_automatica();
  $(".buttonPrevious ").click();
  var checactivado=$("#contenedor_ingredientes :checkbox");

  for (var i =0;  i <=checactivado.length-1;i++) {
    if (checactivado[i].checked==true) {
      eliminar_row(checactivado[i].value);
    }
  }

  validar_Nombre_Producto();
  var Nombre_Producto=document.getElementById("Nombre_Producto").focus();
}


function consulta_automatica() {
  var criterio=document.getElementById('criterio').value;

  if(/[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(criterio)){
    var criterio=document.getElementById('criterio').style.border="2px solid red";
  }else{
    $("#contenedor_registros").load("traer_elementos.php",{criterio:criterio});
    var criterio=document.getElementById('criterio').style.border="2px solid green";
  }
}

function inicio() {
 consulta_automatica();
 $("#criterio").keyup(consulta_automatica);
 $("#id_unidad_medida").change(validar_id_unidad_medida);
 $(".buttonFinish ").value="Finalizar";
 $("#Nombre_Producto").keyup(validar_Nombre_Producto);
 $("#id_empaque").change(validar_id_empaque);
 $("#Id_Unidad").change(validar_Id_Unidad);
 $("#precio_producto").keyup(validar_precio_producto);
 $("#Cantidad_empaque").keyup(validar_Cantidad_empaque);

// aqui abajo es par ael boton finalizar
$(".buttonFinish").click(registrar);

var añandir_funcion=$("#contenedor_ingredientes :checkbox");

for (var i = añandir_funcion.length - 1; i >= 0; i--) {
  añandir_funcion[i].addEventListener("click",mostrar_cantidad,false);
}
var añadir_validacion=$("#contenedor_ingredientes :text");

for (var i = añadir_validacion.length - 1; i >= 0; i--) {
  añadir_validacion[i].addEventListener("keyup",validar_cantidad,false);
}
}

function validar_Nombre_Producto() {

 var Nombre_Producto=document.getElementById('Nombre_Producto').value;
 Nombre_Producto=Nombre_Producto.toLowerCase();

 if(Nombre_Producto==null  || Nombre_Producto.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_Producto)){
  var Nombre_Producto=document.getElementById('Nombre_Producto').style.border="2px solid red";
  return false;
}else if (isNaN(Nombre_Producto)==false) {
  var Nombre_Producto=document.getElementById('Nombre_Producto').style.border="2px solid red";
  return false;
}else if (Nombre_Producto.length>50) {

}else{
  var Nombre_Producto=document.getElementById('Nombre_Producto').style.border="2px solid green";
  var Nombre_Producto=document.getElementById('Nombre_Producto').value;
  Nombre_Producto=Nombre_Producto.toLowerCase();
  $(".StepTitle").text("Asignar Elemento a Producto " + Nombre_Producto);
  return true;
}
}

function registrar() {
  if (validar_Nombre_Producto()==true  && validar_id_empaque()==true && validar_precio_producto()==true && validar_id_unidad_medida()==true && validar_Id_Unidad()==true && validar_Cantidad_empaque()==true) {
   var Cantidad_empaque=document.getElementById('Cantidad_empaque').value;
   var Nombre_Producto=document.getElementById('Nombre_Producto').value;
   var id_empaque=document.getElementById('id_empaque').value;
   var precio_producto=document.getElementById('precio_producto').value;
   var id_unidad_medida=document.getElementById('id_unidad_medida').value;
   

   var Id_Unidad=document.getElementById('Id_Unidad').value;



   var contador_actiados=0;
   var validados=0;
   var activados=0
   var checactivado=$("#contenedor_ingredientes :checkbox");

   for (var i =0;  i <=checactivado.length-1;i++) {
    if (checactivado[i].checked==true) {
      contador_actiados=contador_actiados+1;
      activados=activados+1
      var cantidad_ingrediente=parseInt(document.getElementById(checactivado[i].value).value);
      if(cantidad_ingrediente==null  || cantidad_ingrediente.length==0 || /^\s+$/.test(cantidad_ingrediente) || cantidad_ingrediente<0){
        var cantidad_ingrediente=document.getElementById(checactivado[i].value).style.border="2px solid red";

      } else if (isNaN(cantidad_ingrediente)) {
        var cantidad_ingrediente=document.getElementById(checactivado[i].value).style.border="2px solid red";

      }else{
        var cantidad_ingrediente=document.getElementById(checactivado[i].value).style.border="2px solid green";
        validados=validados+1;

      }
    }

  }

  if (activados==0) {
    swal('Error','Selecciona Un Elemento','error')

  }else{


    if (contador_actiados==validados) {
     $("#contenedor").load("registrar_criterio.php",{Nombre_Producto:Nombre_Producto,id_empaque:id_empaque,precio_producto:precio_producto,id_unidad_medida:id_unidad_medida,Id_Unidad:Id_Unidad,Cantidad_empaque:Cantidad_empaque});

     swal({
      title: 'Creando Producto',
      html: 'Espere....',
      timer: 3000,
      customClass: 'animated tada',
      imageUrl: '../../../images/cerrando_2.gif',
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
  }else{

    swal('Error', 'Ha seleccionado Un elemento y no ha puesto la cantidad','error');
  }
}

}else{

  swal('Error','Algunos Campos Estan Vacios o Incorrectos','error')
}

}



function validar_id_empaque() {
  var id_empaque=document.getElementById('id_empaque').value;
  if (id_empaque=="Selecciona") {
    var id_empaque=document.getElementById('id_empaque').style.border="2px solid red";

    return false;
  }else{
    var id_empaque=document.getElementById('id_empaque').style.border="2px solid green";
    return true;
  }
}

function validar_Id_Unidad() {
  var Id_Unidad=document.getElementById('Id_Unidad').value;
  if (Id_Unidad=="Selecciona") {
    var Id_Unidad=document.getElementById('Id_Unidad').style.border="2px solid red";

    return false;
  }else{
    var Id_Unidad=document.getElementById('Id_Unidad').style.border="2px solid green";
    return true;
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





function validar_precio_producto () {
 var precio_producto=document.getElementById('precio_producto').value;
 if(precio_producto==null  || precio_producto.length==0 || /^\s+$/.test(precio_producto) || precio_producto<0){
  var precio_producto=document.getElementById('precio_producto').style.border="2px solid red";
  return false;
} else if (isNaN(precio_producto)) {
  var precio_producto=document.getElementById('precio_producto').style.border="2px solid red";
  return false;
}else{
  var precio_producto=document.getElementById('precio_producto').style.border="2px solid green";
  return true;
}

}
function validar_Cantidad_empaque () {
 var Cantidad_empaque=document.getElementById('Cantidad_empaque').value;
 if(Cantidad_empaque==null  || Cantidad_empaque.length==0 || /^\s+$/.test(Cantidad_empaque) || Cantidad_empaque<0){
  var Cantidad_empaque=document.getElementById('Cantidad_empaque').style.border="2px solid red";
  return false;
} else if (isNaN(Cantidad_empaque)) {
  var Cantidad_empaque=document.getElementById('Cantidad_empaque').style.border="2px solid red";
  return false;
}else{
  var Cantidad_empaque=document.getElementById('Cantidad_empaque').style.border="2px solid green";
  return true;
}

}


</script>

</html>
