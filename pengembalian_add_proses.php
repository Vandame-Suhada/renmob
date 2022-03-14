<?php session_start();
  include("koneksi.php");
  $ketepatan_waktu=$_POST['ketepatan_waktu'];
  $kerusakan=$_POST['kerusakan'];
  $denda=200000*$ketepatan_waktu;
  $id=$_POST['id_transaksi'];

  $record=mysqli_query($kon, "SELECT tp.id, m.nama_lengkap, m.no_telp, tp.merek_mobil, tp.total_harga, tp.tgl_kembali, tp.id_member, tp.id_kendaraan FROM member as m JOIN transaksi_penyewaan as tp ON m.id=tp.id_member WHERE tp.id='$id'");
  $transaksi=mysqli_fetch_assoc($record);
  $id_penyewaan=$transaksi['id'];
  $no_telp=$transaksi['no_telp'];
  $nama_penyewa=$transaksi['nama_lengkap'];
  $merek_mobil=$transaksi['merek_mobil'];
  $tgl_kembali=$transaksi['tgl_kembali'];
  mysqli_query($kon, "INSERT INTO `pengembalian` (`nama_penyewa`, `no_telp`, `merek_mobil`, `ketepatan_waktu`, `kerusakan`, `denda`,`tanggal`)
                    VALUES ('$nama_penyewa', '$no_telp', '$merek_mobil', '$ketepatan_waktu', '$kerusakan', '$denda', '$tgl_kembali')");

  $total_harga=$transaksi['total_harga'];
  $tambahan=$kerusakan+$denda;
  $total_pemasukan=$total_harga+$tambahan;
  mysqli_query($kon, "INSERT INTO `data_transaksi` (`nama_penyewa`, `no_telp`, `merek_mobil`, `tanggal`, `total_harga`, `tambahan`, `pemasukan`)
                    VALUES ('$nama_penyewa', '$no_telp', '$merek_mobil', '$tgl_kembali', '$total_harga', '$tambahan', '$total_pemasukan')");

  $id_kendaraan=$transaksi['id_kendaraan'];
  $record=mysqli_query($kon, "SELECT * FROM kendaraan_inventaris WHERE id=$id_kendaraan");
  $unit_tersedia=mysqli_fetch_assoc($record);
  $unit_tersedia=$unit_tersedia['unit_tersedia']+1;
  mysqli_query($kon, "UPDATE kendaraan_inventaris SET unit_tersedia=$unit_tersedia WHERE id=$id_kendaraan");
  $id_member=$transaksi['id_member'];
  mysqli_query($kon, "DELETE FROM transaksi_penyewaan WHERE id_member='$id_member' AND id_kendaraan='$id_kendaraan'");
  header('location:pengembalian.php');
?>