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
            Form Barang Edit
            <small>Inventory</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cari Barang</h3>
            </div>
            <form role="form" action="<?php echo base_url(). 'web/search_inventaris_edit'; ?>" method="GET">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">No. Seri Barang</label>
                  <input type="text" class="form-control" name="search_inventaris_edit" placeholder="Masukkan nomor seri barang">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Barang Edit</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(). 'crud/form_update_barang_edit'; ?>" method="POST">
              <?php foreach ($inventaris as $i): ?>
                <div class="box-body">
                  <div class="form-group">
                    <label for="name">No. Inventaris</label>
                    <input type="text" class="form-control" value="<?php echo $i->noinventaris ?>" name="noin" readonly>
                  </div>
                  <div class="form-group">
                    <label for="name">Nama Barang</label>
                    <input type="text" class="form-control" value="<?php echo $i->nama ?>" name="namabarang" readonly>
                  </div>
                  <div class="form-group">
                    <label for="merk">Merk</label>
                    <input type="text" class="form-control" value="<?php echo $i->merk ?>" name="merk" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nsb">No. Seri Barang</label>
                    <input type="text" class="form-control" value="<?php echo $i->noseribarang ?>" name="nsb" readonly>
                  </div>
                  <div class="form-group">
                    <label for="datebeli">Tanggal Beli</label>
                    <input type="text" class="form-control" value="<?php echo $i->tgl_beli ?>" name="datebeli" readonly>
                  </div>
                  <div class="form-group">
                    <label for="kondisibeli">Kondisi Beli</label>
                    <input type="text" class="form-control" value="<?php echo $i->kond_beli ?>" name="kondisibeli" readonly>
                  </div>
                  <div class="form-group">
                    <label for="kondisibarang">Kondisi Barang</label>
                    <select class="form-control" name="kondisibarang">
                      <?php if($i->kond_barang == "Baik") {?>
                        <option value="Baik" selected>Baik</option>
                        <option value="Rusak">Rusak</option>
                      <?php } else {?>
                        <option value="Baik">Baik</option>
                        <option value="Rusak" selected>Rusak</option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tmptpasang">Tempat Pasang pada Divisi</label>
                    <select class="form-control" name="tmptpasang">
                      <option value="<?php echo $i->tmpt_pasang?>" selected><?php echo $i->tmpt_pasang?></option>
                      <option value="Financial & Accounting">Financial & Accounting</option>
                      <option value="HRD">HRD</option>
                      <option value="PR">PR</option>
                      <option value="Information System">Information System</option>
                      <option value="Production">Production</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="datekeluar">Tanggal Pemasangan / Tanggal Keluar</label>
                    <input type="date" class="form-control" name="datekeluar" value="<?php echo $i->tgl_keluar ?>">
                  </div>
                  <div class="form-group">
                    <label for="daterusak">Tanggal Rusak</label>
                    <input type="date" class="form-control" name="daterusak" value="<?php echo $i->tgl_rusak ?>">
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto Barang</label>
                    <?php 
                    if(empty($inventaris)){
                      echo "<input type='text' readonly>"; 
                    } else {
                      echo "<img src='".base_url('uploads/'. $inventaris[0]->foto)."' width='550' height='360'/>"; 
                    }

                    ?>
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
