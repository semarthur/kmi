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
            Details
            <small>Form Revision</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Requisition Form Information System</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url().'crud/form_revision' ?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="noticket">No. Ticket</label>
                  <input type="text" class="form-control" name="noticket" value="<?php echo $details[0]->noticket; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $details[0]->nama; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="From">From</label>
                  <input type="text" class="form-control" name="dari" value="<?php echo $details[0]->dari; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="e_mail">Email address</label>
                  <input type="email" class="form-control" name="e_mail" value="<?php echo $details[0]->e_mail; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="To">To</label>
                  <select class="form-control" name="to">
                    <option value="<?php echo $details[0]->untuk; ?>"><?php echo $details[0]->untuk; ?></option>
                    <option value="ICT">ICT</option>
                    <option value="SWD">SWD</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Date">Date</label>
                  <input type="date" class="form-control" name="date" value="<?php echo $details[0]->date; ?>" >
                </div>
                <div class="form-group">
                  <label for="Case">Case</label>
                  <select class="form-control" name="case">
                    <option value="<?php echo $details[0]->kasus; ?>"><?php echo $details[0]->kasus; ?></option>
                    <option value="Software Package">Software Package</option>
                    <option value="System Application">System Application</option>
                    <option value="Hardware">Hardware</option>
                    <option value="Data Communication / Internet">Data Communication / Internet</option>
                    <option value="LAN / WAN / Communication">LAN / WAN / Communication</option>
                    <option value="Order Catridge / Toner">Order Catridge / Toner</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Duty">Duty</label>
                  <select class="form-control" name="duty">
                    <option value="<?php echo $details[0]->duty; ?>"><?php echo $details[0]->duty; ?></option>
                    <option value="Additional / Change / Delete">Additional / Change / Delete</option>
                    <option value="Installation">Installation</option>
                    <option value="Training">Training</option>
                    <option value="Service / Repair">Service / Repair</option>
                    <option value="Problem Solving">Problem Solving</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Dateoec">Date of Expected Completion</label>
                  <input type="date" class="form-control" name="dateoec" value="<?php echo $details[0]->dateoec; ?>">
                </div>
                <div class="form-group">
                  <label for="Systemint">System Integrated</label>
                  <select class="form-control" name="systemint">
                    <option value="<?php echo $details[0]->systemint; ?>"><?php echo $details[0]->systemint; ?></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Urgency">Urgency</label>
                  <select class="form-control" name="urgency">
                    <option value="<?php echo $details[0]->urgency; ?>"><?php echo $details[0]->urgency; ?></option>
                    <option value="normal">Normal</option>
                    <option value="immedietly">Immedietly</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Desc">Description</label>
                  <input type="text" class="form-control" rows="3" name="desc" value="<?php echo $details[0]->description; ?>" >
                </div>
                <div class="form-group">
                  <label for="approvalstatus">Approval Status</label>
                  <input type="text" class="form-control" name="approvalstatus" value="<?php echo $details[0]->approvalstatus; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="process">Process</label>
                  <input type="text" class="form-control" name="process" value="<?php echo $details[0]->process; ?>" readonly>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
