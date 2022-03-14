<a href="pengeluaran_add.php">
    <button class="btn btn-success" name="sub" value="add" type="button"><i class="fa fa-plus"></i> Add</button>
</a>
<div class="box-body">
<table border="1" style="border-color: #000;" id="dataTables" class="table table-hover table-bordered">
	<thead>
	    <tr>
		    <th style="border-color: #000;" class="text-center small">No</th>
		    <th style="border-color: #000;" class="text-center small">Tanggal</th>
		    <th style="border-color: #000;" class="text-center small">Keperluan</th>
		    <th style="border-color: #000;" class="text-center small">Total Pengeluaran</th>
		    <th style="border-color: #000;" class="text-center small">Action</th>
	    </tr>
	</thead>
  <?php
    function rupiah ($rp_pengeluaran) {
      $hasil = 'Rp. ' . number_format($rp_pengeluaran, 0, ",", ".");
      return $hasil;
      }
  ?>
	<?php  
		include('koneksi.php');
		$record=mysqli_query($kon, "SELECT * FROM data_transaksi ORDER BY tanggal");
		$no=1;
		while($data=mysqli_fetch_assoc($record)){
			$rp_pengeluaran=$data['pengeluaran'];
			if($data['pengeluaran']!=NULL){
    ?>
	<tr>
	    <td style="border-color: #000;" class="text-center"><?php echo $no ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['tanggal'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['keperluan'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo rupiah($rp_pengeluaran) ?></td>
	    <td style="border-color: #000;" class="text-center">
	    <?php
    	echo "<a onclick=\"return confirm('Are you sure you want to delete this item?');\" class=\"btn btn-danger fa fa-trash\" href=\"pengeluaran_delete.php?id=".$data['id']."\"></a>";
        ?>
        </td>
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