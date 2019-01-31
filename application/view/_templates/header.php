<?php
    namespace Mini\Model;
    namespace Mini\Controller;

    use PDO;
  //validación que si haya sesion iniciada
	if(!isset($_SESSION['username'])){
    header('Location: /Proyecto/jirehPC/login');
  }

  // Máxima duración de sesión activa (segundo * minutos * horas)
  define( 'MAX_SESSION_TIEMPO', 60 * 60 * 2 );

  // Controla cuando se ha creado y cuando tiempo ha recorrido
  if ( isset( $_SESSION[ 'ULTIMA_ACTIVIDAD' ] ) &&
  ( time() - $_SESSION[ 'ULTIMA_ACTIVIDAD' ] > MAX_SESSION_TIEMPO ) ) {

    // Si ha pasado el tiempo sobre el limite destruye la session
    header('Location: /Proyecto/jirehPC/login/singout');
  }

  $_SESSION[ 'ULTIMA_ACTIVIDAD' ] = time();

?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jul 2018 00:03:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jireh PC | Administración</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
  <!-- css plugin file input -->
  <link rel="stylesheet" href="<?php echo URL; ?>css/fileinput.min.css">
  <!--data picker css -->
  <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap-datepicker.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URL; ?>css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo URL; ?>css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URL; ?>css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>css/varios.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo URL; ?>css/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo URL; ?>css/datatables.min.css">

  <script src="<?php echo URL; ?>js/jquery.min.js"></script>
  <!--pdf make-->
  <script src="<?php echo URL; ?>js/pdfmake.min.js"></script>
  <script src="<?php echo URL; ?>js/vfs_fonts.js"></script>

  <!--js Sweet alert-->
  <script src="<?php echo URL; ?>js/sweetalert.min.js"></script>
  <!--simple pagination-->
  <script src="<?php echo URL; ?>js/jquery.simplePagination.js"></script>
  <link rel="stylesheet" href="<?php echo URL; ?>css/simplePagination.css">
  <!--select2 plugin-->
  <script src="<?php echo URL; ?>js/select2.min.js"></script>
  <link rel="stylesheet" href="<?php echo URL; ?>css/select2.min.css">
  <!--bootstrap toggle-->
  <script src="<?php echo URL; ?>js/bootstrap-toggle.min.js"></script>
  <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap-toggle.min.css">
  <!--js plugin file input-->
  <script src="<?php echo URL; ?>js/fileinput.min.js"></script>
  <script src="<?php echo URL; ?>js/locales/es.js"></script>

  <!--data picker js-->
  <script src="<?php echo URL; ?>js/bootstrap-datepicker.min.js"></script>

<!-- Bootstrap 3.3.7 -->
  <script src="<?php echo URL; ?>js/bootstrap.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script>
    var Url = "<?=URL?>";
  </script>
</head>
<body class="hold-transition skin-red sidebar-mini fixed">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo URL; ?>cliente" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>PC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Jireh</b>PC</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo URL; ?><?php echo $_SESSION['imgPerfil']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo URL; ?><?php echo $_SESSION['imgPerfil']; ?>" class="img-circle" alt="User Image">

                <p>
                <?php echo $_SESSION['username']; ?>

                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo URL; ?>login/singout" class="btn btn-default btn-flat">Desconectar</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo URL; ?><?php echo $_SESSION['imgPerfil']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>

        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ</li>

        <?php if ($_SESSION['Rol'] == 'Administrador') {  ?>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>Empleado</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>empleado"><i class="fa fa-table"></i> Consultar Empleado</a></li>
            <li><a href="<?php echo URL; ?>empleado/formEmpleado"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Empleado</a></li>
          </ul>

        </li>

        <?php } ?>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-shopping-cart"></i> <span>Pedidos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>pedido"><i class="fa fa-table"></i> Consultar Pedidos</a></li>
            <li><a href="<?php echo URL; ?>pedido/formPedidos"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Pedidos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-barcode"></i>
            <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>producto"><i class="fa fa-table"></i> Consultar Productos</a></li>
            <li><a href="<?php echo URL; ?>producto/formProducto"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Productos</a></li>
            <li><a href="<?php echo URL; ?>producto/catalogo"><i class="fa fa-cubes"></i> Catálogo</a></li>
          </ul>
        </li>

        <?php if ($_SESSION['Rol'] == 'Administrador') {  ?> <!--para inhabilitar  los forms en el rol cliente-->

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>Cliente</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>cliente"><i class="fa fa-table"></i> Consultar Cliente</a></li>
            <li><a href="<?php echo URL; ?>cliente/formCliente"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Cliente</a></li>
          </ul>
        </li>

         <?php } ?>

        <?php if ($_SESSION['Rol'] == 'Administrador') {  ?>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-check"></i> <span>Existencias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>entrada"><i class="fa fa-table"></i> Consultar Entradas</a></li>
            <li><a href="<?php echo URL; ?>salida"><i class="fa fa-table"></i> Consultar Salidas</a></li>
          </ul>
        </li>

      <li class="header">Host <!--Estados y Roles--></li>


      <!--roles falta-->

      <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-coffee"></i> <span>Rol</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>rol"><i class="fa fa-table"></i> Consultar Roles</a></li>
            <li><a href="<?php echo URL; ?>rol/formRol"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Rol</a></li>
          </ul>

        </li> -->
      <!--roles-->

      <!--estados-->

        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-coffee"></i> <span>Estado</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>estados"><i class="fa fa-table"></i> Consultar Estados</a></li>
            <li><a href="<?php echo URL; ?>estados/formEstado"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Estado</a></li>
          </ul>

        </li> -->

      <!--estados-->

      <!--estados pedidos-->

      <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-coffee"></i> <span>Estado Pedidos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>estado_pedido"><i class="fa fa-table"></i> Consultar Estados Pedidos</a></li>
            <li><a href="<?php echo URL; ?>estado_pedido/formEstadosPedidos"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Estado Pedidos</a></li>
          </ul>

        </li> -->

      <!--estados pedidos-->

<!--Categoria-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-coffee"></i> <span>Categoría</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>categoria"><i class="fa fa-table"></i> Consultar Categorias</a></li>
            <li><a href="<?php echo URL; ?>categoria/formCategoria"><i class="glyphicon glyphicon-plus-sign"></i> Registrar Estado Pedidos</a></li>
          </ul>

        </li>
      
      <!--Categoria-->

      <!--Mapa de Navegación-->
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-globe"></i> <span>Información</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                  <li><a href="<?php echo URL; ?>mapa/index"><i class="glyphicon glyphicon-hand-right"></i>Mapa de Navegación</a></li>
          </ul>

        </li>
      
      <!--Mapa de Navegación-->

      <?php } ?>

      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>