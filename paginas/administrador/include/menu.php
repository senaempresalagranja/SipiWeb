<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="../inicio/index.php" class="site_title"><i class="fa fa-home"></i> <span>SIPIWEB</span></a>
          </div>
      

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../../../images/logo.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido(a),</span>
              <h2><?php echo $nombre_usuario ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-newspaper-o"></i> Gestion de Informacion <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="../unidad_medida/index.php">Unidad Medida</a></li>
                    <li><a href="../Empaques/index.php">Empaques</a></li>
                    <li><a href="../areas/index.php">Areas</a></li>
                    <li><a href="../unidad/index.php">Unidades</a></li>
                    <li><a href="../elemento/index.php">Elementos</a></li>
                    <li><a href="../Productos/index.php">Productos</a></li>

                  </ul>
                </li>

                <li><a><i class="fa fa-bell"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="../pedido/index.php">Nuevo Pedido</a></li>
                    <li><a href="../pedido/pedidos.php">Pedidos</a></li>



                  </ul>
                </li>
                                  <li><a><i class="fa fa-car"></i> Traslados <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="../Traslados/pedidos.php">Trasladar</a></li>
                   



                  </ul>
                </li>
                   <li><a><i class="fa fa-cogs"></i> Produccion <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="../produccion/index.php">Resumen Produccion</a></li>
                   



                  </ul>
                </li>
                    <li><a><i class="fa fa-bar-chart"></i> Inventario <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="../inventario/index.php">Inventario</a></li>
                        <li><a href="../abastecer/index.php">Abastecer Inventario</a></li>
                        <li><a href="../abastecer/reabastecimientos.php">Abastecimiento Realizados</a></li>


                      </ul>
                    </li>
                <li><a><i class="fa fa-search"></i> Consultas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="../consultas_elementos/index.php">Elementos</a></li>
                    <li><a href="../consultas_productos/index.php">Productos</a></li>
                    <li><a href="../consultas_pedidos/index.php">Pedidos</a></li>
                    <li><a href="../consultas_inventario_elementos/index.php">Inventario Elemento</a></li>



                  </ul>
                </li>
 <li><a><i class="fa fa-bug"></i> Configuraciones <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="../configuracion/usuarios.php">Usuarios del Sistema</a></li>

                  </ul>
                </li>

              </ul>
            </div>
           <!--  <div class="menu_section">
              <h3>Sistema</h3>
              <ul class="nav side-menu">
               
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div> -->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
       <a data-toggle="tooltip" data-placement="top" href="../pedido/pedidos.php" title="Pedidos">
                <span class="fa fa-calendar aria-hidden="true"></span>
              </a>

              <a data-toggle="tooltip" data-placement="top" href="../configuracion/cambiar_contrasena.php" title="Cambiar Contraseña">
                <span class="fa fa-user-secret" aria-hidden="true"></span>
              </a>

              <a data-toggle="tooltip" data-placement="top" href="../conexion_login/cerrar_sesion.php" title="Cerrar Sesion">
                <span class="fa fa-power-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $nombre_usuario ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li><a href="../configuracion/cambiar_contrasena.php">Cambiar Contraseña</a></li>
                    <li><a href="../conexion_login/cerrar_sesion.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown" id="notificaciones" title="Notificaciones">

                </li>
              </ul>
            </nav>
          </div>
        </div>
        <script type="text/javascript">
         function buscar_pedido() {

          $("#notificaciones").load("../include/buscar_pedido.php")
 // setTimeout('buscar_pedido()',(1000*10));

}
buscar_pedido();
</script>
<!-- /top navigation -->
