<?php
    include("koneksi.php");
    $merek_mobil=$_POST['merek_mobil'];
    $unit_total=$_POST['unit_total'];
    $unit_tersedia=$_POST['unit_tersedia'];
    $harga_sewa=$_POST['harga_sewa'];
    $id=$_POST['id'];
    mysqli_query($kon, "UPDATE kendaraan_inventaris SET merek_mobil='$merek_mobil', unit_total='$unit_total', unit_tersedia='$unit_tersedia', harga_sewa='$harga_sewa' WHERE id='$id'");
    header('location:kendaraan_inventaris.php');
?>