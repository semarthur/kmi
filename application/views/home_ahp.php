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
  <!-- datatables -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/bower_components')?>/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
            <a href="<?php echo base_url().'web/profile' ?>" >
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
        Home
        <small>Status Check</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php 
        $koneksi = mysqli_connect("localhost","root","","newkmi");
        $onprocess = mysqli_query($koneksi,"SELECT COUNT(process) AS 'pop' FROM form WHERE process='On Process'");
        $approved_dh = mysqli_query($koneksi,"SELECT COUNT(approvalstatus) AS 'asdh' FROM form WHERE approvalstatus='Approved by Dept. Head'");
        $approved_am = mysqli_query($koneksi,"SELECT COUNT(approvalstatus) AS 'asam' FROM form WHERE approvalstatus='Approved by A. Manager'");
        $pending = mysqli_query($koneksi,"SELECT COUNT(approvalstatus) AS 'asp' FROM form WHERE approvalstatus='Pending'");
        $countop = mysqli_fetch_assoc($onprocess);
        $countadh = mysqli_fetch_assoc($approved_dh);
        $countasm = mysqli_fetch_assoc($approved_am);
        $countp = mysqli_fetch_assoc($pending);
        ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $printop = $countop['pop'] ?></h3>

              <p>On Process</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $printasm = $countasm['asam'] ?></h3>

              <p>Approved by Ast. Manager</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $printadh = $countadh['asdh'] ?></h3>

              <p>Approved by Dept. Head</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $printp = $countp['asp'] ?></h3>

              <p>Pending</p>
            </div>
            <div class="icon">
              <i class="ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Priority Recommendation using AHP (Analytical Hierarchy Process)</h3>
              </div>
              <div class="box-body">
                <form class="col-md-12" method="GET" action="<?=base_url()?>web/home_sorted_by_ahp">
                  
                  <div class="row">
                    <div class="alert"><?=$consistency?></div>
                  </div>
                  <div class="row" style="height: 5em;">
                    <div class="col-md-1">
                      <h5>Jangka waktu pengerjaan</h5>
                    </div>
                    <div class="col-md-5" id="form-group" style="margin-top: auto; margin-bottom: auto;">
                      <input id="datediff_urgency" name="datediff_urgency" style="width: 100%;" type="range" value="<?=$input_datediff_urgency?>" list="tickmarks" min="0" max="16" kriteria1="Jangka waktu pengerjaan" kriteria2="Urgensi" onchange="updateTextInput(this)">
                    </div>
                    <div class="col-md-1">
                      <h5>Urgensi</h5>
                    </div>
                    <div class="col-md-5">
                      <div id="datediff_urgency_alert" name="datediff_urgency_alert" class="alert alert-info" style="font-size: 90%"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1">
                      <h5>Jangka waktu pengerjaan</h5>
                    </div>
                    <div class="col-md-5" id="form-group">
                      <input id="datediff_duty" name="datediff_duty" style="width: 100%;" type="range" value="<?=$input_datediff_duty?>" list="tickmarks" min="0" max="16" kriteria1="Jangka waktu pengerjaan" kriteria2="Duty" onchange="updateTextInput(this)">
                    </div>
                    <div class="col-md-1">
                      <h5>Duty</h5>
                    </div>
                    <div class="col-md-5">
                      <div id="datediff_duty_alert" class="alert alert-info" style="font-size: 90%"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1">
                      <h5>Duty</h5>
                    </div>
                    <div class="col-md-5" id="form-group">
                      <input id="duty_urgency" name="duty_urgency" style="width: 100%;" type="range" value="<?=$input_duty_urgency?>" list="tickmarks" min="0" max="16" kriteria1="Duty" kriteria2="Urgensi" onchange="updateTextInput(this)">
                    </div>
                    <div class="col-md-1">
                      <h5>Urgensi</h5>
                    </div>
                    <div class="col-md-5">
                      <div id="duty_urgency_alert" class="alert alert-info" style="font-size: 90%"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <input type='submit' value="Submit" class="btn btn-primary" > &nbsp &nbsp 
                      <a href="<?=base_url()?>web/home" class="btn btn-danger">Reset</a>
                  </div>
                </form>
                <div class="col-md-12">
                </div>
              </div>
              <div class="box-header">
                <h3 class="box-title">Priority Task Ranking</h3>
              </div>
              <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" id="recommendation-table">
                    <tr>
                      <th>Rank Task</th>
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
                    <?php $count = 0;?>
                    <?php foreach ($ranked_data as $f) { ?>
                    <tr>
                      <td><?=++$count;?></td>
                      <td><?php echo $f->noticket ?></td>
                      <td><?php echo $f->nama ?></td>
                      <td><?php echo $f->dari ?></td>
                      <td><?php echo $f->untuk ?></td>
                      <td><?php echo $f->date ?></td>
                      <td><?php echo $f->kasus ?></td>
                      <td><?php echo $f->duty ?></td>
                      <td><?php echo $f->dateoec ?></td>
                      <td><?php echo $f->systemint ?></td>
                      <td><?php echo $f->urgency ?></td>
                      <td><?php echo $f->approvalstatus ?></td>
                      <td><?php echo $f->process ?></td>
                    </tr>
                      <?php  } ?>
                  </table>
                </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Status Check</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tablehomeahp">
                <thead>
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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($form as $f) { ?>
                <tr>
                  <td><?php echo $f->noticket ?></td>
                  <td><?php echo $f->nama ?></td>
                  <td><?php echo $f->dari ?></td>
                  <td><?php echo $f->untuk ?></td>
                  <td><?php echo $f->date ?></td>
                  <td><?php echo $f->kasus ?></td>
                  <td><?php echo $f->duty ?></td>
                  <td><?php echo $f->dateoec ?></td>
                  <td><?php echo $f->systemint ?></td>
                  <td><?php echo $f->urgency ?></td>
                  <td><?php echo $f->approvalstatus ?></td>
                  <td><?php echo $f->process ?></td>
                  <td><a class="btn btn-block btn-xs" href="<?php echo base_url()?>web/see_details?noticket=<?php echo $f->noticket ?>"> SEE DETAILS </a></td>
                </tr>
                  <?php } ?>
                </tbody>
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

  <script src="<?php echo base_url ('assets/template/bower_components/jquery')?>/dist/jquery.min.js"></script>
  <script src="<?php echo base_url ('assets/template/bower_components/bootstrap')?>/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url ('assets/template/bower_components/jquery-slimscroll')?>/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url ('assets/template/dist')?>/js/adminlte.min.js"></script>

  <script src="<?php echo base_url ('assets/template/bower_components/datatables.net')?>/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url ('assets/template/bower_components/datatables.net-bs')?>/js/dataTables.bootstrap.min.js"></script>

  <script>
          var datediff_urgency = document.getElementById("datediff_urgency");
          var datediff_duty = document.getElementById("datediff_duty");
          var duty_urgency = document.getElementById("duty_urgency");
          
          updateTextInput(datediff_urgency);
          updateTextInput(datediff_duty);
          updateTextInput(duty_urgency);

          $("#recommendation-table").find('tr')[1].bgColor = "#f65058";
          $("#recommendation-table").find('tr')[2].bgColor = "#fbde44";

                  
          function changeValue(val) {
            if (val == 8) {
                return 1;
            }else if (val > 8) {
                return val - 7;
            }else{
              return Math.abs(val - 9);
            }
          }
          
          function updateTextInput(input) {
            var kriteria = "";
            if (input.value == 8) {
              kriteria = "Keduanya sama-sama pentingnya";
            }else if (input.value > 8) {
              kriteria = "Kriteria " + input.getAttribute("kriteria2") +" lebih penting "  + changeValue(input.value) + " kali daripada " + input.getAttribute("kriteria1");
            }else{
              kriteria = "Kriteria " + input.getAttribute("kriteria1") +" lebih penting "  + changeValue(input.value) + " kali daripada " + input.getAttribute("kriteria2");
            }
            id_slider = input.getAttribute("id");
            $('#' + id_slider + "_alert").html(kriteria);
          }
  </script>

  <script>
    $(document).ready(function() {
      $('#tablehomeahp').DataTable()
    })
  </script>

</body>
</html>