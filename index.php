<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="../../../js/sweetalert2.js"></script>
    <title>Iniciar sesion</title>

  </head>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="sesion.php" method="post" id="formulario_login">
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" name="usuario1" id="usuario" placeholder="Usuario" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="contrasena1" id="contrasena" placeholder="Contraseña" required="" />
              </div>
              <div>
                <input type="button" value="Iniciar Sesion" onclick="acceder()" class="btn btn-default">
                <a class="reset_pass" href="#">Olvido su Contraseña?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
          
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> SIPIWEB</h1>
                  <p>©2018 Todos los Derechos Reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

              
              </div>
              <div id="contenedor_login">
                
                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/essential-plugins.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script src="js/main.js"></script>

  <script type="text/javascript">
    
  function acceder() {

      var usuario=document.getElementById('usuario').value;
      var contrasena=document.getElementById('contrasena').value;
      $("#contenedor_login").load("login.php",{usuario:usuario, contrasena:contrasena})



    }

    var input =document.querySelectorAll(".form-control");

for (var i = input.length - 1; i >= 0; i--) {
  input[i].addEventListener("keyup", function(event) {

  event.preventDefault();

  if (event.keyCode === 13) {
  
acceder()
  }
});

}
 
 </script>
  <script>



</script>
</html>