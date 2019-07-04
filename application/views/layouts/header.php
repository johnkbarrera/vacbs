<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="icon" href="<?=base_url()?>public/fuentes/cow-head-icon.png" type="image/gif">

  <title>VacBS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()."public/"; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()."public/"; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()."public/"; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."public/"; ?>dist/css/AdminLTE.min.css">
   <!-- Morris charts -->
  <link rel="stylesheet" href="<?php echo base_url()."public/"; ?>bower_components/morris.js/morris.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()."public/"; ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <!-- Logo -->
      <a href="<?php echo base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>V</b>BS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Vac</b> BS</span>
      </a>

      <?php if ($this->session->userdata("login")) { ?>
        <div class="navbar-custom-menu" style="margin-right: 15px; margin-left: 15px;">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url()."public/"; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $this->session->userdata("usuario")?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url()."public/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  <p>
                     <?php echo $this->session->userdata("tag")?>
                     <small><?php echo $this->session->userdata("email")?></small>
                    <small><?php echo $this->session->userdata("perfil")?></small>
                   </p>
                 </li>
                 <!-- Menu Footer-->
                <li class="user-footer">
                  <center>
                    <div class="pull">
                      <a href="<?php echo base_url();?>auth/logout" class="btn btn-default btn-flat">Cerrar Sesión</a>
                    </div>
                  </center>
                </li>
               </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      <?php } else { ?>
        <div class="navbar-custom-menu" style="margin-right: 15px; margin-left: 15px;">
          <form action="<?php echo base_url();?>auth" class="navbar-form navbar-right ">
            <div class="form-group">
              <button class="btn btn-success">Ingresar</button>
            </div>
          </form>
        </div>

      <?php } ?>

      <!-- Control Home Button -->
      <div class="navbar-header pull-left" style="margin-left: 15px;">
        <!--<a href="#" class="navbar-brand"><i class="fa fa-home"></i></a>-->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <!-- End Control Home Button -->

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url();?>">Página principal</a></li>
          <!--<li><a href="#">Proyecto</a></li>-->
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mas Información <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Proyecto</a></li>
              <li><a href="#">Artículos</a></li>
              <li><a href="#">Colaboradores</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li> -->
          <?php if ($this->session->userdata("login")) { ?>
            <li><a href="<?php echo base_url()."auth/"; ?>">Dashboard</a></li>
          <?php }; ?>

        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
  </header>
