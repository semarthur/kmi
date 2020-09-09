<?php
if (isset($_GET['download'])) {
  $params = "web/export_history?noticket=".$_GET['noticket']."&page=".$_GET['page'];
  redirect(base_url().$params);
}
?>
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
            Details
            <small>Form Details</small>
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
            <form role="form" action="" method="GET">
              <div class="box-body">
                <div class="form-group">
                  <label for="noticket">No. Ticket</label>
                  <input type="text" class="form-control" name="noticket" value="<?php echo $details[0]->noticket; ?>" readonly>
                  <input type="text" value="details" name="page" hidden/>
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
                  <input type="text" class="form-control" name="untuk" value="<?php echo $details[0]->untuk; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Date">Date</label>
                  <input type="text" class="form-control" name="date" value="<?php echo $details[0]->date; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Case">Case</label>
                  <input type="text" class="form-control" name="kasus" value="<?php echo $details[0]->kasus; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Duty">Duty</label>
                  <input type="text" class="form-control" name="duty" value="<?php echo $details[0]->duty; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Dateoec">Date of Expected Completion</label>
                  <input type="text" class="form-control" name="dateoec" value="<?php echo $details[0]->dateoec; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Systemint">System Integrated</label>
                  <input type="text" class="form-control" name="systemint" value="<?php echo $details[0]->systemint; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Urgency">Urgency</label>
                  <input type="text" class="form-control" name="urgency" value="<?php echo $details[0]->urgency; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="Desc">Description</label>
                  <input type="text" class="form-control" rows="3" name="desc" value="<?php echo $details[0]->description; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="approvalstatus">Approval Status</label>
                  <input type="text" class="form-control" name="approvalstatus" value="<?php echo $details[0]->approvalstatus; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="process">Process</label>
                  <input type="text" class="form-control" name="process" value="<?php echo $details[0]->process; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="startdate">Start Date</label>
                  <input type="text" class="form-control" name="startdate" value="<?php echo $details[0]->startdate; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="starttime">Start Time</label>
                  <input type="text" class="form-control" name="starttime" value="<?php echo $details[0]->starttime; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="finisheddate">Finished Date</label>
                  <input type="text" class="form-control" name="finisheddate" value="<?php echo $details[0]->finisheddate; ?>" readonly>
                </div>
                <!-- <div class="form-group">
                  <label for="reason">Reason</label>
                  <input type="text" class="form-control" name="reason" value="<?php echo $details[0]->reason; ?>" readonly>
                </div> -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" value="Download" name="download" class="btn btn-primary">         
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
