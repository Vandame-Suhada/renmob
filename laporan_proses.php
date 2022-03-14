<?php 
$tahun=$_POST['tahun'];
$bulan=$_POST['bulan'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Print Data Perbulan</title>
  <link rel="icon" type="image/png" href="#">
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

</head>
<body>
 
  <center>
 
    <h2>Laporan Bulanan</h2>
 
  </center>
 
  <?php 
  include 'koneksi.php';
  ?>
  <b><p style="margin-left:10%">Bulan: <?php if($bulan == 1){echo "Januari";}
          elseif($bulan == 2){echo "Febuari";}
          elseif($bulan == 3){echo "Maret";}
          elseif($bulan == 4){echo "April";}
          elseif($bulan == 5){echo "Mei";}
          elseif($bulan == 6){echo "Juni";}
          elseif($bulan == 7){echo "Juli";}
          elseif($bulan == 8){echo "Agustus";}
          elseif($bulan == 9){echo "September";}
          elseif($bulan == 10){echo "Oktober";}
          elseif($bulan == 11){echo "November";}
          elseif($bulan == 12){echo "Desember";} ?>
          <?php echo $tahun;?>
  </p></b>
  <center>
<table border="1" style="border-color: #000; width:80%" id="dataTables" class="table table-hover table-bordered">
  <thead>
      <tr>
        <th style="border-color: #000;" class="text-center">No</th>
        <th style="border-color: #000;" class="text-center">Tanggal</th>
        <th style="border-color: #000;" class="text-center">Pemasukan</th>
        <th style="border-color: #000;" class="text-center">Pengeluaran</th>
      </tr>
  </thead>
  <?php
    function rupiah2 ($rp_pem) {
      $hasil2 = 'Rp. ' . number_format($rp_pem, 0, ",", ".");
      return $hasil2;
      }
  ?>
  <?php
    function rupiah3 ($rp_peng) {
      $hasil3 = 'Rp. ' . number_format($rp_peng, 0, ",", ".");
      return $hasil3;
    }
  ?>
  <?php  
      $record=mysqli_query($kon, "SELECT tanggal, pemasukan, pengeluaran FROM data_transaksi WHERE day(tanggal)=day(tanggal) AND month(tanggal)=$bulan AND year(tanggal)=$tahun GROUP BY tanggal ORDER BY tanggal");
      $no=1;
      while($data=mysqli_fetch_assoc($record)){
        $rp_pem=$data['pemasukan'];
        $rp_peng=$data['pengeluaran'];
  ?>
  <tr>
      <td style="border-color: #000;" class="text-center"><?php echo $no ?></td>
      <td style="border-color: #000;" class="text-center"><?php echo $data['tanggal'] ?></td>
      <td style="border-color: #000;" class="text-center"><?php echo rupiah2($rp_pem) ?></td>
      <td style="border-color: #000;" class="text-center"><?php echo rupiah3($rp_peng) ?></td>
    </tr>
    <?php
    $no++; }
    $record=mysqli_query($kon,"SELECT ifnull(sum(pemasukan),'0') as jpem, ifnull(sum(pengeluaran),'0') as jpen FROM data_transaksi WHERE month(tanggal)=$bulan AND year(tanggal)=$tahun ORDER BY tanggal");
		$data=mysqli_fetch_assoc($record);
    $total_pemasukan=$data['jpem'];
    $total_pengeluaran=$data['jpen'];
  ?>
</form>
</table>
</center>
  <?php
    function rupiah ($total_pemasukan) {
      $hasil = 'Rp. ' . number_format($total_pemasukan, 0, ",", ".");
      return $hasil;
      }
  ?>
  <?php 
    function rupiah1 ($total_pengeluaran) {
      $hasil1 = 'Rp. ' . number_format($total_pengeluaran, 0, ",", ".");
      return $hasil1;
      }
  ?>
<table class="table table-hover table-bordered">
  <thead>
  <tr>
    <th style="" class="text-center">Total Pendapatan Bulan Ini</th>
    <th style="" class="text-center">Total Pengeluaran Bulan Ini</th>
    <th style="" class="text-center">Laba Bersih Bulan Ini</th>
  </tr>
  </thead>
  <tr>
    <td class="text-center"><?php echo rupiah($total_pemasukan) ?></td>
		<td class="text-center"><?php echo rupiah1($total_pengeluaran) ?></td>
		<td class="text-center"><?php echo rupiah($total_pemasukan-$total_pengeluaran) ?></td>
  </tr>
</table>
 
  <script>
    window.print();
  </script>
  <script src="plugins/js/jquery.dataTables.min.js"></script>
<script src="plugins/js/dataTables.bootstrap.min.js"></script>

</body>
</html>