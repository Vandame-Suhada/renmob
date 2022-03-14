<?php session_start();
  include("koneksi.php");
  $sewa_hari=$_POST['sewa_hari'];
  $tgl_sewa=$_POST['tgl_sewa'];
  $tgl_kembali=$_POST['tgl_kembali'];
  $id_member=$_POST['id_member'];
  $id_kendaraan=$_POST['id_kendaraan'];
  
  $record=mysqli_query($kon, "SELECT * FROM kendaraan_inventaris WHERE id='$id_kendaraan'");
  $kendaraan=mysqli_fetch_assoc($record);
  $merek_mobil=$kendaraan['merek_mobil'];
  $harga_sewa=$kendaraan['harga_sewa'];
  $unit_tersedia=$kendaraan['unit_tersedia']-1;

  $total_harga=$sewa_hari*$harga_sewa;

  mysqli_query($kon, "INSERT INTO `transaksi_penyewaan` (`merek_mobil`,`sewa_hari`,`tgl_sewa`,`tgl_kembali`,`total_harga`,`id_member`,`id_kendaraan`)
                    VALUES ('$merek_mobil', '$sewa_hari', '$tgl_sewa', '$tgl_kembali', '$total_harga', '$id_member', '$id_kendaraan')");
  mysqli_query($kon, "UPDATE kendaraan_inventaris SET unit_tersedia=$unit_tersedia WHERE id=$id_kendaraan");
  header('location:penyewaan.php'); 
?>