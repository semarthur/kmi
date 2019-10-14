<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT. KMI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/bower_components')?>/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/bower_components')?>/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/bower_components')?>/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/dist')?>/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/dist')?>/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kawasaki</b>RFS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">New</span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url().'web/profile' ?>" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $this->session->userdata('email') ?></span>
            </a>
          </li>
          <!-- Log Out Button -->
          <li>
            <a href="<?php echo base_url().'web/logout' ?>" class="btn">Log out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REQUISITION FORM SYSTEM</li>
        <li><a href="<?php echo base_url().'web/home' ?>"><i class="fa fa-table"></i> <span>Home</span></a></li>
        <li><a href="<?php echo base_url().'web/form' ?>"><i class="fa fa-files-o"></i> <span>Create New Form</span></a></li>
        <li><a href="<?php echo base_url().'web/change_status' ?>"><i class="fa fa-edit"></i> <span>Status Change</span></a></li>
        <li><a href="<?php echo base_url().'web/inventory' ?>"><i class="fa fa-folder"></i> <span>Inventory</span></a></li> 
        <li><a href="<?php echo base_url().'web/statistics' ?>"><i class="ion ion-stats-bars"></i> <span>Statistics</span></a></li>
        <li><a href="<?php echo base_url().'web/history' ?>"><i class="fa fa-book"></i> <span>History</span></a></li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        History
        <small>Form Done</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Completed Task</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No. Ticket</th>
                  <th>Name</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Date</th>
                  <th>Case</th>
                  <th>Duty</th>
                  <th>Date of Expectancy Completion</th>
                  <th>System Integrated</th>
                  <th>Urgency</th>
                  <th>Approval Status</th>
                  <th>Status</th>
                </tr>
                <?php
                foreach($form_done as $fd){
                  echo "<tr>";
                  echo "<td>".$fd->noticket."</td>";
                  echo "<td>".$fd->nama."</td>";
                  echo "<td>".$fd->dari."</td>";
                  echo "<td>".$fd->untuk."</td>";
                  echo "<td>".$fd->date."</td>";
                  echo "<td>".$fd->kasus."</td>";
                  echo "<td>".$fd->duty."</td>";
                  echo "<td>".$fd->dateoec."</td>";
                  echo "<td>".$fd->systemint."</td>";
                  echo "<td>".$fd->urgency."</td>";
                  echo "<td>".$fd->approvalstatus."</td>";
                  echo "<td>".$fd->process."</td>";
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="https://kawasaki-motor.co.id">Kawasaki Motor</a>.</strong> All rights
    reserved.
  </footer>
</body>
</html>