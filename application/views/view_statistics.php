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
        Statistics
        <small><?php echo date('F') ?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">This Month Statistics</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <script type="text/javascript" src="<?php echo ASSET_PATH; ?>js/Chart.js"></script>

              <div style="width: 800px;margin: 0px auto;">
                <canvas id="myChart"></canvas>
              </div>

              <?php 
              $koneksi = mysqli_connect("localhost","root","","newkmi");
              ?>

              <script>
                /*function showSelected(){
                  var getMonth = document.getElementById("month");
                  var strMonth = getMonth.options[getMonth.selectedIndex].value;
                  document.getElementById("textField").value = strMonth;

                }*/

                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: {
                    labels: ["Not Processed","On Process" ,"Done"],
                    datasets: [{
                      label: '',
                      data: [
                      <?php 
                      $jumlah_np = mysqli_query($koneksi,"select * from form where process='Not Processed' AND MONTH(date) = month(CURRENT_DATE)");
                      echo mysqli_num_rows($jumlah_np);
                      ?>, 
                      <?php 
                      $jumlah_op = mysqli_query($koneksi,"select * from form where process='On Process' AND MONTH(date) = month(CURRENT_DATE)");
                      echo mysqli_num_rows($jumlah_op);
                      ?>,
                      <?php 
                      $jumlah_done = mysqli_query($koneksi,"select * from form_done where process='Done' AND MONTH(created_at) = month(CURRENT_DATE)");
                      echo mysqli_num_rows($jumlah_done);
                      ?>
                      ],
                      backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)'
                      ],
                      borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)'
                      ],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero:true
                        }
                      }]
                    }
                  }
                });
              </script>
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