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
            <a href="<?php echo base_url().'web/notif_req' ?>" >
              <i class="fa fa-bell-o"></i>
              <?php 
              $userdata = $this->session->userdata('email');
              $koneksi = mysqli_connect("localhost","root","","newkmi");
              $countnotif = mysqli_query($koneksi,"SELECT COUNT(email_track_1) AS 'nreq' FROM notifikasi WHERE status='unread' AND email_track_1 LIKE \"%$userdata%\"");
              $countnotifvalue = mysqli_fetch_assoc($countnotif);
              ?>

              <?php if($countnotifvalue == 0) {?>
                <span class="label label-warning"></span>
              <?php } else {?>
                <span class="label label-warning"><?php echo $printop = $countnotifvalue['nreq'] ?></span>
              <?php } ?>
              
            </a>
          </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="<?php echo base_url().'web/profile_req' ?>" class="dropdown-toggle" data-toggle="dropdown">
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
          <li><a href="<?php echo base_url().'web/home_requester' ?>"><i class="fa fa-table"></i> <span>Home</span></a></li>
          <li><a href="<?php echo base_url().'web/form_req' ?>"><i class="fa fa-files-o"></i> <span>Create New Form</span></a></li>
          <li><a href="<?php echo base_url().'web/history_req' ?>"><i class="fa fa-book"></i> <span>History</span></a></li>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Profile
            <small>User Profile</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url().'crud/update_profile_user_req' ?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $akun->nama; ?>" readonly>
                  <input type="text" name="id_account" value="<?php echo $akun->id_account; ?>" hidden/>
                </div>
                <div class="form-group">
                  <label for="e_mail">Email address</label>
                  <input type="email" class="form-control" name="e_mail" value="<?php echo $this->session->userdata('email') ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" value="<?php echo $akun->password; ?>">
                </div>
                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <select class="form-control" name="jabatan">
                    <option value="<?php echo $akun->Jabatan; ?>"><?php echo $akun->Jabatan; ?></option>
                    <option value="Staff">Staff</option>
                    <option value="Assistant Manager">Assistant Manager</option>
                    <option value="Dept Head">Dept Head</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="departemen">Departemen</label>
                  <select class="form-control" name="departemen">
                    <option value="<?php echo $akun->Departemen; ?>"><?php echo $akun->Departemen; ?></option>
                    <option value="Financial & Accounting">Financial & Accounting</option>
                    <option value="HRD">HRD</option>
                    <option value="PR">PR</option>
                    <option value="Information System">Information System</option>
                    <option value="Production">Production</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="notlp">Telephone Number</label>
                  <input type="number" class="form-control" name="notlp" value="<?php echo $akun->telepon; ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" value="Update Profile" class="btn btn-primary">
              </div>
            </form>
          </div>
          <!-- /.box -->
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
