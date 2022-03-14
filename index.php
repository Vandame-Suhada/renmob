<?php 
    require_once("koneksi.php");  
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location:login.php'); 
    } else { 
        $username = $_SESSION['username']; 
        $record=mysqli_query($kon, "SELECT COUNT(id) FROM user");
        $countuser=mysqli_fetch_assoc($record);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Renmob</title>
    <link rel="icon" type="image/png" href="img/logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="img/Logo.png" style="width:50px"></span>
      <!-- logo for regular state and mobile devices -->
      <img src="img/Logo.png" style="width:120px">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-dark bg-primary">
    <?php
    include "koneksi.php";
    $sql = "select * from user where username='$username'";
    $proses = mysqli_query($kon,$sql);
    $record = mysqli_fetch_array($proses);
    ?>
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/user/admin.ico" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $record['nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/user/admin.ico" class="img-circle" alt="User Image">

                <p>
                  <?php echo $record['nama']; ?>
                  <small>Admin</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat"><span class="fa fa-user"></span> Profile</a>
                </div>
                <div class="pull-right">
                  <a href="login.php" class="btn btn-default btn-flat"><span class="fa fa-sign-out"></span> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/user/admin.ico" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $record['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active"><a href="index.php"><img src="img/dashboard.png" style="width: 15px"><span> Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <img src="img/perhitungan.png" style="width: 15px">
            <span>Perhitungan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="stok_kendaraan.php"><img src="img/stok.png" style="width: 15px"> Stok Kendaraan</a></li>
            <li><a href="penyewaan.php"><img src="img/transaksi.png" style="width: 15px">Transaksi Penyewaan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
          <img src="img/pendataan.png" style="width: 15px">
            <span>Pendataan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="kendaraan_inventaris.php"><img src="img/inventaris.png" style="width: 15px"></i> Kendaraan Inventaris</a></li>
            <li><a href="member.php"><img src="img/member.png" style="width: 15px"> Member</a></li>
            <li><a href="pengembalian.php"><img src="img/pengembalian.png" style="width: 15px">Pengembalian</a></li>
            <li><a href="pemasukan.php"><img src="img/pemasukan.png" style="width: 15px"> Pemasukan</a></li>
            <li><a href="pengeluaran.php"><img src="img/pengeluaran.png" style="width: 15px"></i> Pengeluaran</a></li>
          </ul>
        </li>
        <li><a href="laporan.php"><img src="img/bulanan.png" style="width: 15px"> <span>Laporan Bulanan</span></a></li>
        <li><a href="grafik.php"><i class="fa fa-line-chart"></i> <span>Grafik</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> 
      <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <div class="box-body">
                    </div><!-- /.box-body -->

                      <!-- Info boxes -->
                      <div class="row">
                                      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <a href="kendaraan_inventaris.php"><span class="info-box-icon bg-yellow"><img src="img/inventaris.png"></i></span></a>

                            <div class="info-box-content">
                              <span class="info-box-text"><h4>Inventaris Kendaraan</h4></span>
                              <span class="info-box-number"><?php
                                $record=mysqli_query($kon, "SELECT sum(unit_total) as jml FROM kendaraan_inventaris");
                                $data=mysqli_fetch_assoc($record);
                                echo $data['jml']; ?> UNIT</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <a href="member.php"><span class="info-box-icon bg-yellow"><img src="img/member.png"></i></span></a>

                            <div class="info-box-content">
                              <span class="info-box-text"><h4>Member</h4></span>
                              <span class="info-box-number"><?php
                                $record=mysqli_query($kon, "SELECT count(id) as jml FROM member");
                                $data=mysqli_fetch_assoc($record);
                                echo $data['jml']; ?> MEMBER</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <a href="stok_kendaraan.php"><span class="info-box-icon bg-green"><img src="img/stok.png"></i></span></a>

                            <div class="info-box-content">
                              <span class="info-box-text"><h4>Stok Kendaraan</h4></span>
                              <span class="info-box-number"><?php
                                $record=mysqli_query($kon, "SELECT sum(unit_tersedia) as jml FROM kendaraan_inventaris");
                                $data=mysqli_fetch_assoc($record);
                                echo $data['jml']; ?> UNIT TERSEDIA</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <a href="penyewaan.php"><span class="info-box-icon bg-green"><img src="img/transaksi.png"></i></span></a>

                            <div class="info-box-content">
                              <span class="info-box-text"><h4>Transaksi Penyewaan</h4></span>
                              <span class="info-box-number"><?php
                                $record=mysqli_query($kon, "SELECT count(id) as jml FROM transaksi_penyewaan");
                                $data=mysqli_fetch_assoc($record);
                                echo $data['jml']; ?> TRANSAKSI BERJALAN</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <a href="pengembalian.php"><span class="info-box-icon bg-blue"><img src="img/pengembalian.png"></i></span></a>

                            <div class="info-box-content">
                              <span class="info-box-text"><h4>Pengembalian</h4></span>
                              <span class="info-box-number"><?php
                                $record=mysqli_query($kon, "SELECT count(id) as jml FROM pengembalian");
                                $data=mysqli_fetch_assoc($record);
                                echo $data['jml']; ?> TRANSAKSI</span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <a href="laporan.php"><span class="info-box-icon bg-blue"><img src="img/bulanan.png" style="width: 60px"></i></span></a>

                            <div class="info-box-content">
                              <span class="info-box-text"><h4>Laporan Bulanan</h4></span>
                              <span class="info-box-number"><?php
                                function rupiah ($angka) {
                                  $hasil = 'Rp. ' . number_format($angka,0, ",", ".");
                                  return $hasil;
                                }
                                $record=mysqli_query($kon, "SELECT sum(pemasukan) as jml FROM data_transaksi");
                                $data=mysqli_fetch_assoc($record);
                                echo rupiah($data['jml']); ?></span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="info-box">
                            <a href="pengeluaran.php"><span class="info-box-icon bg-red"><img src="img/pengeluaran.png"></span></a>

                            <div class="info-box-content">
                              <span class="info-box-text"><h4>Pengeluaran</h4></span>
                              <span class="info-box-number"><?php
                                $record=mysqli_query($kon, "SELECT sum(pengeluaran) as jml FROM data_transaksi");
                                $data=mysqli_fetch_assoc($record);
                                echo rupiah($data['jml']); ?></span>
                            </div>
                            <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    
                      </div>
                      <!-- /.row -->
                    </div><!-- /.box-header -->
                  </div><!-- /.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.row -->
          </section><!-- /.content -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright@2021 J3D118157 Vandame Ronald Suhada</strong>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
