<div class="box-body">
<table border="1" style="border-color: #000;" id="dataTables" class="table table-hover table-bordered">
	<thead>
	    <tr>
		    <th style="border-color: #000;" class="text-center small">No</th>
		    <th style="border-color: #000;" class="text-center small">Nama</th>
		    <th style="border-color: #000;" class="text-center small">No Telepon</th>
		    <th style="border-color: #000;" class="text-center small">Merek Mobil</th>
		    <th style="border-color: #000;" class="text-center small">Tanggal Pengembalian</th>
		    <th style="border-color: #000;" class="text-center small">Harga</th>
		    <th style="border-color: #000;" class="text-center small">Tambahan</th>
		    <th style="border-color: #000;" class="text-center small">Total Pemasukan</th>
	    </tr>
	</thead>
  <?php
    function rupiah ($rp_total_harga) {
      $hasil = 'Rp. ' . number_format($rp_total_harga, 0, ",", ".");
      return $hasil;
      }
  ?>
  <?php 
    function rupiah1 ($rp_tambahan) {
      $hasil1 = 'Rp. ' . number_format($rp_tambahan, 0, ",", ".");
      return $hasil1;
      }
  ?>
  <?php 
    function rupiah2 ($rp_pemasukan) {
      $hasil2 = 'Rp. ' . number_format($rp_pemasukan, 0, ",", ".");
      return $hasil2;
      }
  ?>
	<?php
		include("koneksi.php");
		$record=mysqli_query($kon, "SELECT * FROM data_transaksi ORDER BY tanggal");
		$no=1;
		while($data=mysqli_fetch_assoc($record)){
			$rp_total_harga=$data['total_harga'];
			$rp_tambahan=$data['tambahan'];
			$rp_pemasukan=$data['pemasukan'];
			if($data['pemasukan']!=NULL){
    ?>
	<tr>
	    <td style="border-color: #000;" class="text-center"><?php echo $no ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['nama_penyewa'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['no_telp'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['merek_mobil'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['tanggal'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo rupiah($rp_total_harga) ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo rupiah1($rp_tambahan) ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo rupiah2($rp_pemasukan) ?></td>
		<?php
		$no++; 
			}
		?>
	</tr>
    <?php
		}
	?>
</form>
</table>
</div><!-- /.box-body -->