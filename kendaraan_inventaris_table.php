<a href="kendaraan_inventaris_add.php">
    <button class="btn btn-success" name="sub" value="add" type="button"><i class="fa fa-plus"></i> Add</button>
</a>
<div class="box-body">
<table border="1" style="border-color: #000;" id="dataTables" class="table table-hover table-bordered">
	<thead>
	    <tr>
		    <th style="border-color: #000;" class="text-center small">No</th>
		    <th style="border-color: #000;" class="text-center small">Merek Mobil</th>
		    <th style="border-color: #000;" class="text-center small">Total Unit</th>
		    <th style="border-color: #000;" class="text-center small">Harga/Hari</th>
		    <th style="border-color: #000;" class="text-center small">Action</th>
	    </tr>
	</thead>
	<?php  
		include("koneksi.php");
		$record=mysqli_query($kon, "SELECT * FROM kendaraan_inventaris");
		$no=1;
		function rupiah ($rp) {
			$hasil = 'Rp. '.number_format($rp, 0, ",", ".");
			return $hasil;
			}
		while($data=mysqli_fetch_assoc($record)){
	?>
	<tr>
	    <td style="border-color: #000;" class="text-center"><?php echo $no ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['merek_mobil'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo $data['unit_total'] ?></td>
	    <td style="border-color: #000;" class="text-center"><?php echo rupiah($data['harga_sewa'])?></td>
	    <td style="border-color: #000;" class="text-center">
	    <?php
	    echo "<a class=\"btn btn-warning fa fa-pencil\" href=\"kendaraan_inventaris_edit_delete.php?aksi=Edit&id=".$data['id']."\"></a>&nbsp;";
    	echo "<a onclick=\"return confirm('Are you sure you want to delete this item?');\" class=\"btn btn-danger fa fa-trash\" href=\"kendaraan_inventaris_edit_delete.php?aksi=Delete&id=".$data['id']."\"></a>";
        ?>
        </td>
    </tr>
    <?php
		$no++; }
	?>
</form>
</table>
</div><!-- /.box-body -->