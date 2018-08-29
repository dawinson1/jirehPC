<?php
    namespace Mini\Model;
    
    use PDO;
	if(!isset($_SESSION['username'])){
    header('Location: /Proyecto/jirehPC/login');
  }
		
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
  <!--js Sweet alert-->
  <script src="<?php echo URL; ?>js/sweetalert.min.js"></script>

  <!--js plugin file input-->
  <script src="<?php echo URL; ?>js/fileinput.min.js"></script>
  <script src="<?php echo URL; ?>js/locales/es.js"></script>
  
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
    <a href="../../index2.html" class="logo">
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
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo URL; ?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo URL; ?>img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo URL; ?>img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
          <img src="<?php echo URL; ?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ</li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>Empleado</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>empleado"><i class="fa fa-table"></i> Tabla Empleado</a></li>
            <li><a href="<?php echo URL; ?>empleado/formEmpleado"><i class="glyphicon glyphicon-plus-sign"></i> Formulario Empleado</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-shopping-cart"></i> <span>Pedidos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-table"></i> Tabla Pedidos</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-plus-sign"></i> Formulario Pedidos</a></li>
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
            <li><a href="#"><i class="fa fa-table"></i> Tabla Productos</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-plus-sign"></i> Formulario Productos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>Cliente</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>cliente"><i class="fa fa-table"></i> Tabla Cliente</a></li>
            <li><a href="<?php echo URL; ?>cliente/formCliente"><i class="glyphicon glyphicon-plus-sign"></i> Formulario Cliente</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-check"></i> <span>Existencias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-table"></i> Tabla Existencias</a></li>
          </ul>
        </li>
        
      <li class="header">Host Estados y Roles</li>

      <!--roles falta-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-coffee"></i> <span>Rol</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>rol"><i class="fa fa-table"></i> Tabla Roles</a></li>
            <li><a href="<?php echo URL; ?>rol/formRol"><i class="glyphicon glyphicon-plus-sign"></i> Formulario Rol</a></li>
          </ul>
          
        </li>
      <!--roles-->

      <!--estados-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-coffee"></i> <span>Estado</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>estados"><i class="fa fa-table"></i> Tabla Estados</a></li>
            <li><a href="<?php echo URL; ?>estados/formEstado"><i class="glyphicon glyphicon-plus-sign"></i> Formulario Estado</a></li>
          </ul>
          
        </li>

      <!--estados-->

      <!--estados pedidos-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-coffee"></i> <span>Estado Pedidos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo URL; ?>estado_pedido"><i class="fa fa-table"></i> Tabla Estados Pedidos</a></li>
            <li><a href="<?php echo URL; ?>estado_pedido/formEstadosPedidos"><i class="glyphicon glyphicon-plus-sign"></i> Formulario Estado Pedidos</a></li>
          </ul>
          
        </li>
        
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
            <li><a href="<?php echo URL; ?>categoria"><i class="fa fa-table"></i> Tabla Categorias</a></li>
            <li><a href="<?php echo URL; ?>categoria/formCategoria"><i class="glyphicon glyphicon-plus-sign"></i> Formulario Estado Pedidos</a></li>
          </ul>
          
        </li>
        
      <!--Categoria-->


      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>    
