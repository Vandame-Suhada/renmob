<?php session_start();
  include("koneksi.php");
  $merek_mobil=$_POST['merek_mobil'];
  $unit_total=$_POST['unit_total'];
  $harga_sewa=$_POST['harga_sewa'];

  mysqli_query($kon, "INSERT INTO `kendaraan_inventaris` (`merek_mobil`,`unit_total`,`unit_tersedia`,`harga_sewa`)
                    VALUES ('$merek_mobil', '$unit_total', '$unit_total', '$harga_sewa')");
  header('location:kendaraan_inventaris.php');
?>