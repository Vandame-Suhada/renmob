<?php session_start();
  include("koneksi.php");
  $tanggal=$_POST['tanggal_pengeluaran'];
  $keperluan=$_POST['keperluan'];
  $total=$_POST['total_pengeluaran'];

  mysqli_query($kon, "INSERT INTO `data_transaksi` (`tanggal`,`keperluan`,`pengeluaran`)
                    VALUES ('$tanggal', '$keperluan', '$total')");
  header('location:pengeluaran.php');
?>