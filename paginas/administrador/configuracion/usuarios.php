
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
        <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12 text-right">
          <a href="crear_usuario.php" class=""><button class="btn btn-danger">
           <i class="icon icon-user"></i>
           Nuevo Usuario
         </button></a>
       </div>
     </div>
     <div class="row">
      <div class="col-xs-10 col-sm-12 col-md-12 col-lg-12">
        <h1>Lista de Usuarios <i class="fa fa-users"></i></h1>
        <hr>
      </div>
    </div>


    <div class="container-fluid" style="height: 80%;">


      <?php 


      $query="SELECT  `Usuario`, `Rol`,`Activo`,Id_usuario, Nombre_Usuario FROM `usuarios` ORDER BY Rol";
      $resource=mysqli_query($conexion,$query);
      while ($fila=mysqli_fetch_row($resource)) {

        if ($fila[2]==0) {
         $icono="icon   icon-user-check";
         $color="green";
         $titulo="Usuario Activo";
       }else{
        $icono="icon  icon-user-minus"; 
        $color="red"; 
        $titulo="Usuario Inactivo";
      }
      ?>
      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
        <div class="well profile_view">
          <div class="col-sm-12">
            <h4 class="brief"><i>SENA (Centro Agropecuario La Granja)</i></h4>
            <div class="left col-xs-7">
              <h2><?php echo $fila[4] ?></h2>
              <p><strong>Usuario: </strong><?php echo $fila[0] ?> </p>
              <p><strong>Rol: </strong><?php echo $fila[1] ?> </p>
              <ul class="list-unstyled">
                <!-- <li><i class="fa fa-unlock-alt"></i> Contraseña: No Disponible </li> -->
                <!-- <li><i class="fa fa-phone"></i> Phone #: </li> -->
              </ul>
            </div>
            <div class="right col-xs-5 text-center">
              <img src="../../../images/user.png" alt="" class="img-circle img-responsive">
            </div>
          </div>
          <div class="col-xs-12 bottom text-center">
            <div class="col-xs-12 col-sm-6 emphasis">
              <p class="ratings">Nivel de Acceso</p>
              <?php 
              if ($fila[1]=="Administrador" and $fila[2]==0) {
               ?>
               <p class="ratings">
                <a>5.0</a>
                <a href="#"><span class="fa fa-star"></span></a>
                <a href="#"><span class="fa fa-star"></span></a>
                <a href="#"><span class="fa fa-star"></span></a>
                <a href="#"><span class="fa fa-star"></span></a>
                <a href="#"><span class="fa fa-star"></span></a>

                <!-- <a href="#"><span class="fa fa-star-o"></span></a> -->
              </p>
              <?php 

            }else if ($fila[1]=="Administrador" and $fila[2]!=0) {
             ?>
             <p class="ratings">
              <a>0.0</a>
              <!-- <a href="#"><span class="fa fa-star"></span></a> -->
              <a href="#"><span class="fa fa-star-o"></span></a>
              <a href="#"><span class="fa fa-star-o"></span></a>
              <a href="#"><span class="fa fa-star-o"></span></a>
              <a href="#"><span class="fa fa-star-o"></span></a>
              <a href="#"><span class="fa fa-star-o"></span></a>
            </p>
            <?php 
          }
          ?>
          
        </div>
        <div class="col-xs-12 col-sm-6 emphasis">
          <?php if ($fila[2]==0) {
           ?>
           <button type="button" class="btn btn-success btn-xs" title="Estado Activado"> Activado <i class="fa fa-thumbs-up">
           </i>  </button>
           <?php 
         } else{

          ?>
          <button type="button" class="btn btn-danger btn-xs" title="Estado Desactivado"> Desactivado <i class="fa fa-times-circle">
          </i> </button>
          <?php 
        }

        ?>
        <form action="editar_usuario.php" method="post">
          <input type="hidden" name="id_usuario" value="<?php echo "$fila[3]"; ?>">
          <button type="submit" class="btn btn-primary btn-xs">
            <i class="fa fa-edit"> </i> Editar Usuario

          </form>  
          
        </button>
      </div>
    </div>
  </div>
</div>
<?php 

}
?>
</div>
</div>
</div>




<!-- /#page-content-wrapper -->



</body>


</style>
<?php
include '../include/footer.php';
?>


</html>