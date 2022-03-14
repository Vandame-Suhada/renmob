<?php
    include("koneksi.php");
    $id=$_GET['id'];
    mysqli_query($kon, "DELETE FROM transaksi_penyewaan WHERE id='$id'");
    $record=mysqli_query($kon, "SELECT * FROM kendaraan_inventaris WHERE id='$id_kendaraan'");
    $stok=mysqli_fetch_assoc($record);
    $stok=$stok['unit_tersedia']+1;
    mysqli_query($kon, "UPDATE kendaraan_inventaris SET unit_tersedia='$stok' WHERE id='$id_kendaraan'");
    header('location:penyewaan.php');
    ?>