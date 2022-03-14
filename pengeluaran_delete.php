<?php
    include("koneksi.php");
    $id=$_GET['id'];
    mysqli_query($kon, "DELETE FROM data_transaksi WHERE id='$id'");
    header('location:pengeluaran.php');
?>