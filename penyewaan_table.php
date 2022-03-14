<div class="box-body">
	<a href="penyewaan_add.php">
    	<button class="btn btn-success" name="sub" value="add" type="button"><i class="fa fa-plus"></i> Add</button>
    </a>
<table border="1" style="border-color: #000;" id="dataTables" class="table table-hover table-bordered">
	<thead>
	    <tr>
		    <th style="border-color: #000;" class="text-center small">No</th>
		    <th style="border-color: #000;" class="text-center small">Nama Penyewa</th>
			<th style="border-color: #000;" class="text-center small">No HP</th>
			<th style="border-color: #000;" class="text-center small">Merek Mobil</th>
		    <th style="border-color: #000;" class="text-center small">Waktu Penyewaan</th>
		    <th style="border-color: #000;" class="text-center small">Batas Kembali</th>
		    <th style="border-color: #000;" class="text-center small">Total Harga</th>
		    <th style="border-color: #000;" class="text-center small">Action</th>
	    </tr>
	</thead>
  <?php
    function rupiah ($rp_total_harga) {
      $hasil = 'Rp. ' . number_format($rp_total_harga, 0, ",", ".");
      return $hasil;
      }
  ?>
	<?php 
		include("koneksi.php");
		$record=mysqli_query($kon, "SELECT transaksi_penyewaan.id, transaksi_penyewaan.id_member, member.nama_lengkap, member.no_telp, transaksi_penyewaan.merek_mobil, transaksi_penyewaan.tgl_sewa, transaksi_penyewaan.tgl_kembali, transaksi_penyewaan.total_harga FROM transaksi_penyewaan JOIN member ON transaksi_penyewaan.id_member=member.id ORDER BY transaksi_penyewaan.tgl_kembali");
		$no=1;
		while($data=mysqli_fetch_assoc($record)){
			$rp_total_harga=$data['total_harga'];
	?>
	<form>
	<tr>
	    <td style="border-color: #000;" class="text-center"><?php echo $no ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['nama_lengkap'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['no_telp'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['merek_mobil'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['tgl_sewa']?></td>
		<td style="border-color: #000;" class="text-center"><?php echo $data['tgl_kembali']?></td>
		<td style="border-color: #000;" class="text-center"><?php echo rupiah($rp_total_harga)?></td>
	    <td style="border-color: #000;" class="text-center">
	    <?php
		echo "<a class=\"btn btn-info fa fa-print\" href=\"penyewaan_nota_print.php?aksi=Print&id=".$data['id']."\"></a>&nbsp;";
    	echo "<a onclick=\"return confirm('Are you sure you want to delete this item?');\" class=\"btn btn-danger fa fa-trash\" href=\"penyewaan_delete.php?id=".$data['id']."\"></a>";
        ?>
        </td>
    </tr>
	</form>
	<?php 
		$no++;
		}
	?>
</table>
</div>