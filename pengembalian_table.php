<a href="pengembalian_add.php">
    <button class="btn btn-success" name="sub" value="add" type="button"><i class="fa fa-plus"></i> Add</button>
</a>
<div class="box-body">
<table border="1" style="border-color: #000;" id="dataTables" class="table table-hover table-bordered">
	<thead>
	    <tr>
		    <th style="border-color: #000;" class="text-center small">No</th>
		    <th style="border-color: #000;" class="text-center small">Nama</th>
		    <th style="border-color: #000;" class="text-center small">No HP</th>
		    <th style="border-color: #000;" class="text-center small">Merek Mobil</th>
			<th style="border-color: #000;" class="text-center small">Tanggal</th>
		    <th style="border-color: #000;" class="text-center small">Ketepatan Waktu</th>
		    <th style="border-color: #000;" class="text-center small">Kerusakan & Denda</th>
	    </tr>
	</thead>
  <?php
    function rupiah ($rp_total) {
      $hasil = 'Rp. ' . number_format($rp_total, 0, ",", ".");
      return $hasil;
      }
  ?>
	<?php  
		include("koneksi.php");
		$record=mysqli_query($kon, "SELECT * FROM pengembalian ORDER BY tanggal");
		$no=1;
		while($data=mysqli_fetch_assoc($record)){
			$rp_denda=$data['denda'];
			$rp_kerusakan=$data['kerusakan'];
			$rp_total=$rp_denda + $rp_kerusakan;
    ?>
	<tr>
	    <td style="border-color: #000;" class="text-center"><?php echo $no ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['nama_penyewa'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['no_telp'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['merek_mobil'] ?></td>
		<td style="border-color: #000;" class="text-center"><?php echo $data['tanggal'] ?></td>
	    <td style="border-color: #000;" class="text-center">Telat &nbsp;<?php echo $data['ketepatan_waktu'] ?> &nbsp;Hari</td>
	    <td style="border-color: #000;" class="text-center"><?php echo rupiah($rp_total) ?></td>
    </tr>
    <?php
		$no++; }
	?>
</form>
</table>
</div>