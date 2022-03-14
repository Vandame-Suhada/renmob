<?php session_start();
  include("koneksi.php");
  $nama_lengkap=$_POST['nama_lengkap'];
  $no_telp=$_POST['no_telp'];
  $jenis_kelamin=$_POST['jenis_kelamin'];
  $alamat=$_POST['alamat'];

  mysqli_query($kon, "INSERT INTO `member` (`nama_lengkap`,`no_telp`,`jenis_kelamin`,`alamat`)
                    VALUES ('$nama_lengkap', '$no_telp', '$jenis_kelamin', '$alamat')");
  header('location:member.php');
?>