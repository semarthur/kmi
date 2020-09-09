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
            <a href="<?php echo base_url().'web/notif' ?>" >
              <i class="fa fa-bell-o"></i>
              <?php 
              $userdata = $this->session->userdata('email');
              $koneksi = mysqli_connect("localhost","root","","newkmi");
              $countnotif = mysqli_query($koneksi,"SELECT COUNT(email_track_2) AS 'nreq' FROM notifikasi WHERE status='unread' AND email_track_2 LIKE \"%$userdata%\"");
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
          <li><a href="<?php echo base_url().'web/manage_account' ?>"><i class="fa fa-wrench"></i> <span>Manage Account</span></a></li>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Change Form Status
            <small>Requisition Form</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cari Form</h3>
            </div>
            <form role="form" action="<?php echo base_url(). 'web/search_change'; ?>" method="GET">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">No. Ticket</label>
                  <input type="text" class="form-control" name="search" placeholder="Masukkan nomor ticket">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Status Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(). 'crud/form_update_process'; ?>" method="POST">
              <?php foreach ($form as $f): ?>
                <div class="box-body">
                  <div class="form-group">
                    <label for="noticket">No. Ticket</label>
                    <input type="text" class="form-control" value="<?php echo $f->noticket ?>" name="noticket" readonly>
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="<?php echo $f->nama ?>" name="name" readonly>
                  </div>
                  <div class="form-group">
                    <label for="from">From</label>
                    <input type="text" class="form-control" value="<?php echo $f->dari ?>" name="from" readonly>
                  </div>
                  <div class="form-group">
                    <label for="e_mail">E-mail</label>
                    <input type="email" class="form-control" value="<?php echo $f->e_mail ?>" name="e_mail" readonly>
                  </div>
                  <div class="form-group">
                    <label for="to">To</label>
                    <input type="text" class="form-control" value="<?php echo $f->untuk ?>" name="to" readonly>
                  </div>
                  <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" value="<?php echo $f->date ?>" name="date" readonly>
                  </div>
                  <div class="form-group">
                    <label for="case">Case</label>
                    <input type="text" class="form-control" value="<?php echo $f->kasus ?>" name="case" readonly>
                  </div>
                  <div class="form-group">
                    <label for="duty">duty</label>
                    <input type="text" class="form-control" value="<?php echo $f->duty ?>" name="duty" readonly>
                  </div>
                  <div class="form-group">
                    <label for="dateoec">Date of Expected Completion</label>
                    <input type="date" class="form-control" value="<?php echo $f->dateoec ?>" name="dec" readonly>
                  </div>
                  <div class="form-group">
                    <label for="si">System Integrated</label>
                    <input type="text" class="form-control" value="<?php echo $f->systemint ?>" name="si" readonly>
                  </div>
                  <div class="form-group">
                    <label for="urgency">Urgency</label>
                    <input type="text" class="form-control" value="<?php echo $f->urgency ?>" name="urgency" readonly>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" value="<?php echo $f->description ?>" name="description" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Approval Status</label>
                    <input type="text" class="form-control" value="<?php echo $f->approvalstatus ?>" name="approvalstatus" readonly>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                      <option value="<?php echo $f->process ?>" selected><?php echo $f->process ?></option>
                      <option value="On Process">On Process</option>
                      <option value="Done">Done</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="startdate">Start Date</label>
                    <input type="date" class="form-control" value="<?php echo $f->startdate ?>" name="startdate">
                  </div>
                  <div class="form-group">
                    <label for="starttime">Start Time</label>
                    <input type="time" class="form-control" value="<?php echo $f->starttime ?>" name="starttime">
                  </div>
                  <div class="form-group">
                    <label for="finisheddate">Finished Date</label>
                    <input type="date" class="form-control" value="<?php echo $f->finisheddate ?>" name="finisheddate">
                  </div>
                  <!-- <div class="form-group">
                    <label for="reason">Reason</label>
                    <input type="text" class="form-control" value="<?php echo $f->reason ?>" name="reason" readonly>
                  </div> -->
                </div>
                <!-- /.box-body -->

                <!-- <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                <div class="box-footer">
                  <?php if($f->approvalstatus == "Approved by A. Manager" || $f->approvalstatus == "Approved by Dept. Head") {?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  <?php } else {?>
                    <a class="btn btn-primary disabled">Submit</a>
                  <?php } ?>           
              </div>
              <?php endforeach ?>
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
